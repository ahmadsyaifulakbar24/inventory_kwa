let item = []

get_item()

function get_item() {
    $.ajax({
        url: api_url + 'item/get',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
                item[index] = {
                    id: value.id,
                    kode: value.kode,
                    nama_barang: value.nama_barang,
                    satuan: value.satuan,
                    jenis: value.jenis
                }
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_item()
            }, 1000)
        }
    })
}

$('#add_item').click(function() {
    let length = $('.form-item').length + 1
    add_item(length)
})

$(document).on('change', '.item_id', function() {
    let unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close-item', function() {
	if ($('.form-item').length > 1) {
	    $(this).parents('.form-item').slideUp('fast', function() {
	        $(this).remove()
		    $('.number').each(function(i, o) {
		        $(this).html((i + 1) + ')')
		    })
		    $('.item_id').each(function(i, o) {
		        $(this).attr('data-id', (i + 1))
		    })
		    $('.total').each(function(i, o) {
		        $(this).attr('data-id', (i + 1))
		    })
		    let length = $('.form-item').length + 1
		    length == 1 ? add_item(length) : ''
		})
	}
})

function add_item(id, item_id, total, satuan, description) {
    let append, append_item, kabel, odp, odc, otb, pipa, tiang
    $.each(item, function(index, value) {
        // console.log(value)
    	if (item_id == value.id) {
            append_item = `<option value="${value.id}" data-unit="${value.satuan}" selected>${value.nama_barang}</option>`
        } else {
            append_item = `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        if (value.jenis == 'Kabel') {
            kabel += append_item
        } else if (value.jenis == 'ODP') {
            odp += append_item
        } else if (value.jenis == 'ODC') {
            odc += append_item
        } else if (value.jenis == 'OTB') {
            otb += append_item
        } else if (value.jenis == 'Pipa') {
            pipa += append_item
        } else if (value.jenis == 'Tiang') {
            tiang += append_item
        }
    })
    if (id == undefined) id = 1
    if (total == undefined) total = ''
    if (satuan == undefined) satuan = 'Satuan'
    if (description == undefined) description = ''
    append = `<div class="form-item">
		<div class="form-group row">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-md-4 col-2">
        		<h3 class="number text-center">${id})</h3>
        	</div>
        	<div class="col-md-7 col-9">
				<div class="form-group">
					<label class="form-label">Nama Material</label>
					<div class="close form-close close-item" title="Hapus">
						<i class="mdi mdi-trash-can-outline mdi-18px pr-0"></i>
					</div>
					<select class="custom-select item_id" data-id="${id}" role="button">
						<option disabled selected>Pilih</option>
						<optgroup label="Kabel">${kabel}</optgroup>
						<optgroup label="ODP">${odp}</optgroup>
						<optgroup label="ODC">${odc}</optgroup>
						<optgroup label="OTB">${otb}</optgroup>
						<optgroup label="Pipa">${pipa}</optgroup>
						<optgroup label="Tiang">${tiang}</optgroup>
					</select>
					<div class="invalid-feedback">Pilih nama material</div>
				</div>
				<div class="form-group request">
					<label class="form-label">Total Request</label>
					<div class="input-group">
						<input type="number" class="form-control total" data-id="${id}" value="${total}">
						<div class="input-group-append">
							<span class="input-group-text">${satuan}</span>
						</div>
						<div class="invalid-feedback">Masukkan total request</div>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Keterangan <span class="text-secondary">(Optional)</span></label>
					<textarea class="form-control form-control-sm description" data-id="${id}">${description}</textarea>
					<div class="invalid-feedback">Masukkan keterangan</div>
				</div>
			</div>
		</div>
	</div>`
    $('#data').append(append)
    if (id != 1) $('#data').find('.form-item').last().hide().slideDown('fast')
}

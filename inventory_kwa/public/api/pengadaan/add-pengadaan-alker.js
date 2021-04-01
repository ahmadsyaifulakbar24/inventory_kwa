let alker = []

get_main_alker()

function get_main_alker() {
    $.ajax({
        url: api_url + 'alker/get_main_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
                alker[index] = {
                    id: value.id,
                    kode: value.kode_main_alker,
                    nama_barang: value.nama_barang,
                    satuan: value.satuan
                }
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_main_alker()
            }, 1000)
        }
    })
}

$('#add_alker').click(function() {
    let length = $('.form-alker').length + 1
    add_alker(length)
})

$(document).on('change', '.main_alker_id', function() {
    let unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close-alker', function() {
	if ($('.form-alker').length > 1) {
	    $(this).parents('.form-alker').slideUp('fast', function() {
	        $(this).remove()
		    $('.number').each(function(i, o) {
		        $(this).html((i + 1) + ')')
		    })
		    $('.main_alker_id').each(function(i, o) {
		        $(this).attr('data-id', (i + 1))
		    })
		    $('.total').each(function(i, o) {
		        $(this).attr('data-id', (i + 1))
		    })
		    let length = $('.form-alker').length + 1
		    length == 1 ? add_alker(length) : ''
	    })
	}
})

function add_alker(id, alker_id, total, satuan) {
    let append, option = ''
    $.each(alker, function(index, value) {
        if (alker_id == value.id) {
            option += `<option value="${value.id}" data-unit="${value.satuan}" selected>${value.nama_barang}</option>`
        } else {
            option += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
    })
    if (id == undefined) id = 1
    if (total == undefined) total = ''
    if (satuan == undefined) satuan = 'Satuan'
    append = `<div class="form-alker">
		<div class="form-group row">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-md-4 col-2">
        		<h3 class="number text-center">${id})</h3>
        	</div>
        	<div class="col-md-7 col-9">
				<div class="form-group">
					<label class="form-label">Nama Alker/Salker</label>
					<div class="close form-close close-alker" title="Hapus">
						<i class="mdi mdi-trash-can-outline mdi-18px pr-0"></i>
					</div>
					<select class="custom-select main_alker_id" data-id="${id}" role="button">
						<option disabled selected>Pilih</option>
						${option}
					</select>
					<div class="invalid-feedback">Pilih nama alker/salker</div>
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
			</div>
		</div>
	</div>`
    $('#data').append(append)
    if (id != 1) $('#data').find('.form-alker').last().hide().slideDown('fast')
}

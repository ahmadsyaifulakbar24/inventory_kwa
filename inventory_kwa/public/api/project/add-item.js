let item = []
let append, appendItem, unit, col, del

apiItem()

function apiItem() {
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
                    keterangan: value.keterangan,
                    satuan: value.satuan,
                    jenis: value.jenis,
                    stock: value.stock
                }
            })
            addItem(1, true)
            $('#form').show()
            $('#loading').addClass('hide')
            $('#submit').attr('disabled', false)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiItem()
            }, 1000)
        }
    })
}

$('#add-item').click(function() {
    let length = $('select').length + 1
    addItem(length)
})

$(document).on('change', 'select', function() {
    unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close', function() {
    $(this).parents('.form-data').remove()
    $('select').each(function(i, o) {
        $(this).attr('name', 'item_id[' + (i + 1) + ']')
    })
    $('input[type="number"]').each(function(i, o) {
        $(this).attr('name', 'quantity[' + (i + 1) + ']')
    })
    let length = $('select').length + 1
    length == 1 ? addItem(length) : ''
})

function addItem(dataItem) {
	append = ''
    $.each(item, function(index, value) {
        append += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    appendItem =
        `<div class="form-data" data-item="${dataItem}">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 col-md-6 col-11">
				<select name="item_id[${dataItem}]" class="custom-select" role="button">
					<option disabled selected>Pilih</option>
					${append}
				</select>
				<div class="invalid-feedback">Pilih nama barang</div>
			</div>
			<div class="close mt-1" role="button">
				<i class="mdi mdi-close mdi-18px pr-0"></i>
			</div>
		</div>
		<div class="form-group row request">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Request Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="input-group">
					<input type="number" name="quantity[${dataItem}]" class="form-control">
					<div class="input-group-append">
						<span class="input-group-text">Satuan</span>
					</div>
					<div class="invalid-feedback">Masukkan request barang</div>
				</div>
			</div>
		</div>
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data').append(appendItem)
}

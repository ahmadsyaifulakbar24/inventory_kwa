let item = []
let total = 0

api_provinsi()

function api_provinsi() {
    $.ajax({
        url: api_url + 'provinsi',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append
            $.each(result.data, function(index, value) {
                append = `<option value=${value.id}>${value.provinsi}</option>`
                $('#provinsi_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_provinsi()
            }, 1000)
        }
    })
}

function api_kab_kota(provinsi_id) {
    $.ajax({
        url: api_url + 'kab_kota/' + provinsi_id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append
            $.each(result.data, function(index, value) {
                append = `<option value=${value.id}>${value.kab_kota}</option>`
                $('#kab_kota_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_kab_kota(provinsi_id)
            }, 1000)
        }
    })
}

function api_item() {
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
            $('#form').removeClass('hide')
            $('#loading').addClass('hide')
            total++
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_item()
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
    total < 1 ? api_item() : ''
})

$('#add-item').click(function() {
    let length = $('.items').length + 1
    addItem(length)
})

let provinsi_id
$('#provinsi_id').change(function() {
    provinsi_id = $(this).val()
    $('#kab_kota_id').html('<option disabled selected>Pilih</option>')
    api_kab_kota(provinsi_id)
})

let unit
$(document).on('change', '.items', function() {
    unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close', function() {
    $(this).parents('.form-data').remove()
    $('.items').each(function(i, o) {
        $(this).attr('name', 'item_id[' + (i + 1) + ']')
    })
    $('input[type="number"]').each(function(i, o) {
        $(this).attr('name', 'quantity[' + (i + 1) + ']')
    })
    let length = $('.items').length + 1
    length == 1 ? addItem(length) : ''
})

let option, append

function addItem(dataItem) {
    option = ''
    $.each(item, function(index, value) {
        option += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    append =
        `<div class="form-data" data-item="${dataItem}">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 col-md-6 col-11">
				<select name="item_id[${dataItem}]" class="custom-select items" role="button">
					<option disabled selected>Pilih</option>
					${option}
				</select>
				<div class="invalid-feedback">Pilih nama barang.</div>
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
					<div class="invalid-feedback">Masukkan request barang.</div>
				</div>
			</div>
		</div>
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data').append(append)
}

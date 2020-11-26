let item = []
let total = 0
let col, del, sta, dis, acp = 0

api_provinsi()
api_item()

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

function api_kab_kota(provinsi_id, kab_kota_id) {
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
            if (kab_kota_id !== undefined) {
                $('#kab_kota_id').val(kab_kota_id)
                $('#form').removeClass('hide')
                $('#loading').addClass('hide')
                total++
            }
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
            api_project()
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_item()
            }, 1000)
        }
    })
}

function api_project() {
    $.ajax({
        url: api_url + 'project/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            $('#project_name').val(value.project_name)
            $('#provinsi_id').val(value.provinsi.id)
            api_kab_kota(value.provinsi.id, value.kab_kota.id)
            $('#kecamatan').val(value.kecamatan)
            $.each(value.project_items, function(index, value) {
                if (value.status == 'pending') {
                    addItem(value.id, 'u')
                } else if (value.status == 'accepted') {
                    addItem(value.id, 'a')
                    acp++
                } else {
                    addItem(value.id, 'n')
                }
                $('.item_id[data-id="' + value.id + '"]').find('option[value="' + value.item.id + '"]').attr('selected', 'selected')
                $('.quantity[data-id="' + value.id + '"]').val(value.quantity)
                $('.quantity[data-id="' + value.id + '"]').parents('.input-group').find('.input-group-text').html(value.item.satuan)
                $('.category[data-id="' + value.id + '"]').val(value.category)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_project()
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
    total < 1 ? api_project() : ''
})

$('#add-item').click(function() {
    let length = $('.select-n').length + 1
    addItem(length, 'n')
})

let provinsi_id
$('#provinsi_id').change(function() {
    provinsi_id = $(this).val()
    $('#kab_kota_id').html('<option disabled selected>Pilih</option>')
    api_kab_kota(provinsi_id)
})

let unit
$(document).on('change', '.item_id', function() {
    unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close', function() {
    $(this).parents('.form-item').remove()
    $('select.select-n').each(function(i, o) {
        $(this).attr('name', 'item_id[' + (i + 1) + ']')
    })
    $('input.input-n').each(function(i, o) {
        $(this).attr('name', 'quantity[' + (i + 1) + ']')
        $(this).data('id', (i + 1))
    })
    let length = $('.select-n').length + 1
    if (($('select.select-u').length - acp) == 0) {
        length == 1 ? addItem(length, 'n') : ''
    }
})

function addItem(id, status) {
    let option = ''
    let append = ''
    $.each(item, function(index, value) {
        option += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    if (status == 'a') {
        sta = 'u'
        dis = 'disabled'
        col = 'col-lg-6 col-md-7'
        del = ''
    } else {
        if (status == 'u') {
            sta = 'u'
        } else {
            sta = 'n'
        }
        dis = ''
        col = 'col-md-6 col-11'
        del =
            `<div class="close mt-1" role="button">
			<i class="mdi mdi-close mdi-18px pr-0"></i>
		</div>`
    }
    append =
        `<div class="form-item">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 ${col}">
				<select class="custom-select select-${sta} item_id" data-id="${id}" data-status="${sta}" role="button" ${dis}>
					<option disabled selected>Pilih</option>
					${option}
				</select>
				<div class="invalid-feedback">Pilih nama barang.</div>
			</div>
			${del}
		</div>
		<div class="form-group row request">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Request Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="input-group">
					<input type="number" class="form-control input-${sta} quantity" data-id="${id}" ${dis}>
					<div class="input-group-append">
						<span class="input-group-text">Satuan</span>
					</div>
					<div class="invalid-feedback">Masukkan request barang.</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kategori</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<select class="custom-select select-${sta} category" data-id="${id}" role="button" ${dis}>
					<option disabled selected>Pilih</option>
					<option value="horizontal">Horizontal</option>
					<option value="vertical">Vertikal</option>
				</select>
				<div class="invalid-feedback">Pilih kategori.</div>
			</div>
		</div>
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data-' + status).append(append)
}

let item = []
let total = 0
let del, sta, dis, acp = 0

let length = 0
let u_length = 0

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
            let tanggal_approve, nama_supplier, kontak_supplier, image1, image2
            $.each(value.project_items, function(index, value) {
                u_length++
                value.date_approved != null ? tanggal_approve = value.date_approved : tanggal_approve = '-'
                value.supplier_name != null ? nama_supplier = value.supplier_name : nama_supplier = '-'
                value.supplier_contact != null ? kontak_supplier = value.supplier_contact : kontak_supplier = '-'
                value.image1 != null ? image1 = value.image1 : image1 = '-'
                value.image2 != null ? image2 = value.image2 : image2 = '-'
                addItem(value.id, 'u', value.category, false, value.created_at, tanggal_approve, nama_supplier, kontak_supplier, image1, image2, index + 1)
                $('.item_id[data-id="' + value.id + '"]').find('option[value="' + value.item.id + '"]').attr('selected', 'selected')
                $('.quantity[data-id="' + value.id + '"]').val(value.quantity)
                $('.quantity[data-id="' + value.id + '"]').parents('.input-group').find('.input-group-text').html(value.item.satuan)
                $('.category[data-id="' + value.id + '"]').val(value.category)
            })
            length = u_length
            // console.log('length: ' + length)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_project()
            }, 1000)
        }
    })
}

$('#add-item').click(function() {
    length++
    let lengths = $('.select-n.item_id').length + 1
    addItem(length, 'n', '', false, '', '', '', '', '', '', length)

    $('.select-n.item_id').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })
    $('.input-n.quantity').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })
    $('.select-n.category').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })

    // console.clear()
    // console.log('length: ' + length)
    // console.log('new length: ' + lengths)
})

let provinsi_id
$('#provinsi_id').change(function() {
    provinsi_id = $(this).val()
    $('#kab_kota_id').html('<option disabled selected>Mengambil data...</option>')
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
    let status = $(this).data('status')
    status == 'u' ? u_length-- : ''
    length--

    $(this).parents('.form-item').remove()
    $('.number').each(function(i, o) {
        $(this).html((i + 1) + ')')
    })
    $('.select-n.item_id').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })
    $('.input-n.quantity').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })
    $('.select-n.category').each(function(i, o) {
        $(this).attr('data-id', (i + 1))
    })

    let item_length = $('.form-item').length + 1
    if (item_length == 1) {
        addItem(item_length, 'n', '', false, '', '', '', '', '', '', item_length)
        length++
    }

    // console.clear()
    // console.log('length: ' + length)
})

function addItem(id, status, category, disabled, tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, image1, image2, number) {
    // alert(
    //     'id: ' + id + '\n' +
    //     'status: ' + status + '\n' +
    //     'category: ' + category + '\n' +
    //     'disabled: ' + disabled + '\n' +
    //     'tanggal_request: ' + tanggal_request + '\n' +
    //     'tanggal_approve: ' + tanggal_approve + '\n' +
    //     'nama_supplier: ' + nama_supplier + '\n' +
    //     'kontak_supplier: ' + kontak_supplier + '\n' +
    //     'image1: ' + image1 + '\n' +
    //     'image2: ' + image2 + '\n' +
    //     'number: ' + number + '\n'
    // )
    let img = ''
    if (image1 == null && image2 == null) {
        img = `
		<div>
			<a href="${image1}" class="btn btn-sm btn-outline-primary">Foto 1</a>
			<a href="${image2}" class="btn btn-sm btn-outline-primary">Foto 2</a>
		</div>`
    } else {
        img = '<div>-</div>'
    }

    let option = ''
    let append = ''
    let detail = `<div class="form-group">
		<label class="form-label">Tanggal Request</label>
		<p>${tanggal_request}</p>
	</div>
	<div class="form-group">
		<label class="form-label">Tanggal Approve</label>
		<p>${tanggal_approve}</p>
	</div>
	<div class="form-group">
		<label class="form-label">Nama Supplier</label>
		<p>${nama_supplier}</p>
	</div>
	<div class="form-group">
		<label class="form-label">Kontak Supplier</label>
		<p>${kontak_supplier}</p>
	</div>
	<div class="form-group">
		<label class="form-label">Foto</label>
		${img}
	</div>`

    status == 'n' ? detail = '' : ''

    if (disabled == true) {
        dis = 'disabled'
        del = ''
    } else {
        dis = ''
        del = `<div class="close pb-2" data-status="${status}" role="button">
			<i class="mdi mdi-close mdi-18px pr-0"></i>
		</div>`
    }

    $.each(item, function(index, value) {
        option += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    if (status == 'a') {
        sta = 'u'
    } else {
        if (status == 'u') {
            sta = 'u'
        } else {
            sta = 'n'
        }
    }
    append = `<div class="form-item ${category}">
    	<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-xl-3 col-lg-4 col-md-5 col-2">
        		<h3 class="number text-center">${number})</h3>
        	</div>
        	<div class="col-xl-5 col-lg-6 col-md-7 col-10">
				<div class="form-group">
					<label class="form-label">Nama Barang</label>
					${del}
					<select class="custom-select select-${sta} item_id" data-id="${id}" data-status="${sta}" role="button" ${dis}>
						<option disabled selected>Pilih</option>
						${option}
					</select>
					<div class="invalid-feedback">Pilih nama barang.</div>
				</div>
				<div class="form-group request">
					<label class="form-label">Request Barang</label>
					<div class="input-group">
						<input type="number" class="form-control input-${sta} quantity" data-id="${id}" ${dis}>
						<div class="input-group-append">
							<span class="input-group-text">Satuan</span>
						</div>
						<div class="invalid-feedback">Masukkan request barang.</div>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Kategori</label>
					<select class="custom-select select-${sta} category" data-id="${id}" role="button" ${dis}>
						<option disabled selected>Pilih</option>
						<option value="horizontal">Horizontal</option>
						<option value="vertical">Vertikal</option>
					</select>
					<div class="invalid-feedback">Pilih kategori.</div>
				</div>
				${detail}
			</div>
		</div>
	</div>`
    $('#data-' + status).append(append)
}

$('#filter').change(function() {
    let val = $(this).val()
    if (val == 'horizontal') {
        $('.horizontal').show()
        $('.vertical').hide()
    } else if (val == 'vertical') {
        $('.horizontal').hide()
        $('.vertical').show()
    } else {
        $('.horizontal').show()
        $('.vertical').show()
    }
})

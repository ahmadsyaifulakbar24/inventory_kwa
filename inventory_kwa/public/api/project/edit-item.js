let item = []
let total = 0
let del, dis, acp = 0

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
                $('#data').removeClass('hide')
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
            let tanggal_approve,
            	nama_supplier = '-',
            	kontak_supplier = '-',
            	tipe_supplier = '-'
            $.each(value.project_items, function(index, value) {
            	// console.log(value)
                value.date_approved != null ? tanggal_approve = value.date_approved : tanggal_approve = '-'
                if (value.supplier) {
	                value.supplier.name != null ? nama_supplier = value.supplier.name : ''
	                value.supplier.contact != null ? kontak_supplier = value.supplier.contact : ''
	                value.supplier.type != null ? tipe_supplier = value.supplier.type : ''
	            }
                if (value.status == 'pending') {
                    addItem(
                    	'u',
                    	value.id,
                    	value.category,
                    	value.status,
                    	value.created_at,
                    	tanggal_approve,
                    	nama_supplier,
                    	kontak_supplier,
                    	tipe_supplier,
                    	value.url,
                    	value.image1,
                    	value.image2,
                    	index + 1,
                    	false
                    )
                } else {
                    addItem(
                    	'u',
                    	value.id,
                    	value.category,
                    	value.status,
                    	value.created_at,
                    	tanggal_approve,
                    	nama_supplier,
                    	kontak_supplier,
                    	tipe_supplier,
                    	value.url,
                    	value.image1,
                    	value.image2,
                    	index + 1,
                    	true
                    )
                }
                $('.item_id[data-id="' + value.id + '"]').find('option[value="' + value.item.id + '"]').attr('selected', 'selected')
                $('.quantity[data-id="' + value.id + '"]').val(value.quantity)
                $('.quantity[data-id="' + value.id + '"]').parents('.input-group').find('.input-group-text').html(value.item.satuan)
                $('.category[data-id="' + value.id + '"]').val(value.category)
                u_length++
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
    addItem('n', length, '', '', '', '', '', '', '', '', '', '', length, false)

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

$('#provinsi_id').change(function() {
    let provinsi_id = $(this).val()
    $('#kab_kota_id').html('<option disabled selected>Mengambil data...</option>')
    api_kab_kota(provinsi_id)
})

$(document).on('change', '.item_id', function() {
    let unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close', function() {
    let type = $(this).data('type')
    type == 'u' ? u_length-- : ''
    length--
	if ($('.form-item').length > 1) {
	    $(this).parents('.form-item').slideUp('fast', function() {
	        $(this).remove()
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
		        addItem('n', item_length, '', '', '', '', '', '', '', '', '', '', item_length, false)
		        length++
		    }
		})
	}

    // console.clear()
    // console.log('length: ' + length)
})

function addItem(type, id, category, status, tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, tipe_supplier, url, image1, image2, number, disabled) {
    // alert(
    //     'type: ' + type + '\n' +
    //     'id: ' + id + '\n' +
    //     'category: ' + category + '\n' +
    //     'status: ' + status + '\n' +
    //     'tanggal_request: ' + tanggal_request + '\n' +
    //     'tanggal_approve: ' + tanggal_approve + '\n' +
    //     'nama_supplier: ' + nama_supplier + '\n' +
    //     'kontak_supplier: ' + kontak_supplier + '\n' +
    //     'tipe_supplier: ' + tipe_supplier + '\n' +
    //     'url: ' + url + '\n' +
    //     'image1: ' + image1 + '\n' +
    //     'image2: ' + image2 + '\n' +
    //     'number: ' + number + '\n' +
    //     'disabled: ' + disabled + '\n'
    // )

    let img = ''
    if (image1 != null && image2 != null) {
        img = `<a href="${image1}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 1</a>
			<a href="${image2}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 2</a>`
    } else {
        img = '<div class="font-weight-bold">-</div>'
    }

    let tipe = ''
    if (tipe_supplier == 'offline') {
        tipe = `<div class="form-group">
			<label class="col-form-label">Kontak Supplier</label>
			<div class="font-weight-bold">${kontak_supplier}</div>
		</div>`
    } else if (tipe_supplier == 'online') {
        tipe = `<div class="form-group">
			<label class="col-form-label">URL</label>
			<div class="font-weight-bold"><a href="${url}" target="_blank">${url}</a></div>
		</div>`
    } else {
        tipe = ''
    }

    if (disabled == true) {
        dis = 'disabled'
        del = ''
    } else {
        dis = ''
        if (level == 102) {
	        del = `<div class="close form-close close-item" data-type="${type}" title="Hapus">
				<i class="mdi mdi-trash-can-outline mdi-18px pr-0"></i>
			</div>`
		}
    }

    let kabel, odp, odc, otb, pipa, tiang
    $.each(item, function(index, value) {
        // console.log(value)
        if (value.jenis == 'Kabel') {
            kabel += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        else if (value.jenis == 'ODP') {
            odp += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        else if (value.jenis == 'ODC') {
            odc += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        else if (value.jenis == 'OTB') {
            otb += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        else if (value.jenis == 'Pipa') {
            pipa += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
        else if (value.jenis == 'Tiang') {
            tiang += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
        }
    })

    let success = ''
    let approve = ''
    if (status == 'pending') {
        success = 'text-warning'
    } else {
        success = 'text-success'
        approve = `<div class="form-group">
			<label class="col-form-label">Tanggal Approve</label>
			<div class="font-weight-bold">${tanggal_approve}</div>
		</div>
		<div class="form-group">
			<label class="col-form-label">Nama Supplier</label>
			<div class="font-weight-bold">${nama_supplier}</div>
		</div>
		${tipe}
		<div class="form-group">
			<label class="col-form-label">Foto</label>
			<div>${img}</div>
		</div>`
    }

    let detail = `<div class="form-group">
		<label class="col-form-label">Status</label>
		<div class="font-weight-bold text-capitalize ${success}">${status}</div>
	</div>
	<div class="form-group">
		<label class="col-form-label">Tanggal Request</label>
		<div class="font-weight-bold">${tanggal_request}</div>
	</div>
	${approve}`

    type == 'n' ? detail = '' : ''

    let append = ''
    append = `<div class="form-item ${category}">
		<div class="form-group row">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-md-4 col-2">
        		<h3 class="number text-center">${number})</h3>
        	</div>
        	<div class="col-md-7 col-9">
				<div class="form-group">
					<label class="form-label">Nama Material</label>
					${del}
					<select class="form-control select-${type} item_id" data-id="${id}" data-type="${type}" role="button" ${dis}>
						<option disabled selected>Pilih</option>
						<optgroup label="Kabel">${kabel}</optgroup>
						<optgroup label="ODP">${odp}</optgroup>
						<optgroup label="ODC">${odc}</optgroup>
						<optgroup label="OTB">${otb}</optgroup>
						<optgroup label="Pipa">${pipa}</optgroup>
						<optgroup label="Tiang">${tiang}</optgroup>
					</select>
					<div class="invalid-feedback">Pilih nama material.</div>
				</div>
				<div class="form-group request">
					<label class="form-label">Request Material</label>
					<div class="input-group">
						<input type="number" class="form-control input-${type} quantity" data-id="${id}" ${dis}>
						<div class="input-group-append">
							<span class="input-group-text">Satuan</span>
						</div>
						<div class="invalid-feedback">Masukkan jumlah request material.</div>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Kategori</label>
					<select class="form-control select-${type} category" data-id="${id}" role="button" ${dis}>
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
    $('#data-' + type).append(append)
    if (id != 1) $('#data-' + type).find('.form-item').last().hide().slideDown('fast')
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

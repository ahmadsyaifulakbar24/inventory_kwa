api_project()

function api_project() {
    $.ajax({
        url: api_url + 'project/get/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            $('#project_name').html(value.project_name)
            $('#provinsi_id').html(value.provinsi.provinsi)
            $('#kab_kota_id').html(value.kab_kota.kab_kota)
            $('#kecamatan').html(value.kecamatan)
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
                addItem(
                    value.id,
                    value.item.nama_barang,
                    value.quantity,
                    value.category,
                    value.item.satuan,
                    value.status,
                    value.created_at,
                    tanggal_approve,
                    nama_supplier,
                    kontak_supplier,
                    tipe_supplier,
                    value.url,
                    value.image1,
                    value.image2,
                    index + 1
                )
            })
            api_supplier()
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_project()
            }, 1000)
        }
    })
}

function api_supplier() {
    $.ajax({
        url: api_url + 'supplier/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            let append = '<option disabled selected>Pilih</option>'
            $.each(result.data, function(index, value) {
                append += `<option value="${value.id}" data-type="${value.type}" data-contact="${value.contact}">${value.name}</option>`
            })
            $('#supplier_id').append(append)
            $('#form').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_supplier()
            }, 1000)
        }
    })
}

function addItem(id, name, quantity, category, satuan, status, tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, tipe_supplier, url, image1, image2, number) {
    let img = ''
    if (image1 != null && image2 != null) {
        img = `<a href="${image1}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 1</a>
			<a href="${image2}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 2</a>`
    } else {
        img = '<div class="font-weight-bold">-</div>'
    }

    let type = ''
    if (tipe_supplier == 'offline') {
        type = `<div class="form-group">
			<label class="col-form-label">Kontak Supplier</label>
			<div class="font-weight-bold">${kontak_supplier}</div>
		</div>`
    } else if (tipe_supplier == 'online') {
        type = `<div class="form-group">
			<label class="col-form-label">URL</label>
			<div class="font-weight-bold"><a href="${url}" target="_blank">${url}</a></div>
		</div>`
    } else {
        type = ''
    }

    let detail = ''
    if (status == 'pending') {
        success = 'text-warning'
        detail = `<div class="form-group mt-4">
			<button class="btn btn-block btn-primary approve" data-id="${id}" data-toggle="modal" data-target="#modal-approve">Approve</button>
		</div>`
    } else {
        success = 'text-success'
        detail = `<div class="form-group">
			<label class="col-form-label">Tanggal Approve</label>
			<div class="font-weight-bold">${tanggal_approve}</div>
		</div>
		<div class="form-group">
			<label class="col-form-label">Nama Supplier</label>
			<div class="font-weight-bold">${nama_supplier}</div>
		</div>
		${type}
		<div class="form-group">
			<label class="col-form-label">Foto</label>
			<div>${img}</div>
		</div>`
    }

    let cat = ''
    category == 'horizontal' ? cat = 'Horizontal' : cat = 'Vertikal'

    let append = `<div class="form-data" data-item="${id}">
    	<div class="form-group row mb-2 mb-md-3">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-lg-5 col-md-6 col-2">
        		<h3 class="number text-center">${number})</h3>
        	</div>
        	<div class="col-lg-6 col-md-6 col-10">
				<div class="form-group">
					<label class="col-form-label">Nama Material</label>
					<div class="font-weight-bold">${name}</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Request Material</label>
					<div class="font-weight-bold">${quantity} ${satuan}</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Kategori</label>
					<div class="font-weight-bold">${cat}</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Status</label>
					<div class="font-weight-bold text-capitalize ${success}" id="status${id}">${status}</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Tanggal Request</label>
					<div class="font-weight-bold">${tanggal_request}</div>
				</div>
				${detail}
			</div>
		</div>
	</div>`
    $('#data').append(append)
}

$(document).on('click', '.approve', function() {
    let id = $(this).data('id')
    $('#approve').attr('data-id', id)
})

$('#supplier_id').change(function() {
    let type = $(this).find(':selected').data('type')
    let contact = $(this).find(':selected').data('contact')
    if (type == 'offline') {
        $('#supplier_contact').html(contact)
        $('#supplier_contact').parents('.form-group').removeClass('hide')
        $('#url').parents('.form-group').addClass('hide')
    } else if (type == 'online') {
        $('#supplier_contact').parents('.form-group').addClass('hide')
        $('#url').parents('.form-group').removeClass('hide')
        $('#url').focus()
    } else if (contact == '00000000') {
        $('#supplier_contact').parents('.form-group').addClass('hide')
        $('#url').parents('.form-group').addClass('hide')
    }
    $('.is-invalid').removeClass('is-invalid')
    $('#url').val('')
})

$('#approve').submit(function(e) {
    buttonLoading()
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')

    let id_item = $(this).data('id')
    let supplier_id = $('#supplier_id').val()
    let type = $('#supplier_id').find(':selected').data('type')
    let url = $('#url').val()

    fd.delete('supplier_id')
    fd.delete('image1')
    fd.delete('image2')
    fd.delete('url')
    fd.append('supplier_id', supplier_id)
    fd.append('image1', front_picture)
    fd.append('image2', back_picture)
    type == 'online' ? fd.append('url', url) : ''
    // console.clear()
    // console.log(...fd)

    $.ajax({
        url: api_url + 'item/accept/' + id_item,
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            location.href = root + 'approve-barang/' + id
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(err)
            if (err.supplier_id) {
                $('#supplier_id').addClass('is-invalid')
                $('#supplier_id-feedback').html('Pilih nama supplier.')
            }
            if (err.image1) {
                $('#front_picture').addClass('is-invalid')
                $('#image1-feedback').html('Masukkan foto.')
            }
            if (err.image2) {
                $('#back_picture').addClass('is-invalid')
                $('#image2-feedback').html('Masukkan foto.')
            }
            if (err.url) {
                if (err.url == "The url field is required.") {
                    $('#url').addClass('is-invalid')
                    $('#url-feedback').html('Masukkan URL.')
                } else if (err.url == "The url format is invalid.") {
                    $('#url').addClass('is-invalid')
                    $('#url-feedback').html('Masukkan URL dengan benar.')
                }
            }
        }
    })
})

$('#modal-approve').on('hidden.bs.modal', function(e) {
    refreshModal()
    $('.is-invalid').removeClass('is-invalid')
})

function refreshModal() {
    front_picture = null
    back_picture = null
    let append = `<div class="mb-2" id="front">
		<div class="file-group file-front">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="front_picture" data-picture="front" role="button" accept=".png, .jpg, .jpeg">
				<label class="custom-file-label">Pilih Foto</label>
				<div id="image1-feedback" class="invalid-feedback"></div>
			</div>
		</div>
	</div>
	<div class="mb-2" id="back">
		<div class="file-group file-back">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="back_picture" data-picture="back" role="button" accept=".png, .jpg, .jpeg">
				<label class="custom-file-label">Pilih Foto</label>
				<div id="image2-feedback" class="invalid-feedback"></div>
			</div>
		</div>
	</div>`
    $('#foto').html(append)
    $('#supplier_id').prop('selectedIndex', 0)
    $('#supplier_contact').parents('.form-group').addClass('hide')
    $('#url').parents('.form-group').addClass('hide')
}

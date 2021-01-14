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
            let tanggal_approve, nama_supplier = '', kontak_supplier = ''
            $.each(value.project_items, function(index, value) {
                value.date_approved != null ? tanggal_approve = value.date_approved : tanggal_approve = '-'
                if (value.supplier) {
	                value.supplier.name != null ? nama_supplier = value.supplier.name : ''
	                value.supplier.contact != null ? kontak_supplier = value.supplier.contact : ''
	            }
                addItem(value.id, value.item.nama_barang, value.quantity, value.category, value.item.satuan, value.status, value.created_at, tanggal_approve, nama_supplier, kontak_supplier, value.image1, value.image2, index + 1)
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
            	append += `<option value="${value.id}" data-contact="${value.contact}">${value.name}</option>`
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

function addItem(id, name, quantity, category, satuan, status, tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, image1, image2, number) {
    let img = ''
    if (image1 != null && image2 != null) {
        img = `<a href="${image1}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 1</a>
			<a href="${image2}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 2</a>`
    } else {
        img = '<div class="font-weight-bold">-</div>'
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
		<div class="form-group">
			<label class="col-form-label">Kontak Supplier</label>
			<div class="font-weight-bold">${kontak_supplier}</div>
		</div>
		<div class="form-group">
			<label class="form-label d-block">Foto</label>
			${img}
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
					<label class="col-form-label">Nama Barang</label>
					<div class="font-weight-bold">${name}</div>
				</div>
				<div class="form-group">
					<label class="col-form-label">Request Barang</label>
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
    let value = $(this).find(':selected').data('contact')
    $('#supplier_contact').html(value)
    $('#supplier_contact').parents('.form-group').removeClass('hide')
    $('.is-invalid').removeClass('is-invalid')
})

$('#approve').submit(function(e) {
    buttonLoading()
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')

    let id_item = $(this).data('id')
    let supplier_id = $('#supplier_id').val()

    fd.delete('supplier_id')
    fd.delete('image1')
    fd.delete('image2')
    fd.append('supplier_id', supplier_id)
    fd.append('image1', front_picture)
    fd.append('image2', back_picture)

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
            // console.log(id)
            // console.log(...fd)
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
        }
    })
})

$('#modal-approve').on('hidden.bs.modal', function(e) {
    $('#supplier_id').prop('selectedIndex', 0)
    $('#supplier_contact').parents('.form-group').addClass('hide')
    refreshFoto()
    $('.is-invalid').removeClass('is-invalid')
})

function refreshFoto() {
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
}

api_project()

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
            $('#project_name').html(value.project_name)
            $('#provinsi_id').html(value.provinsi.provinsi)
            $('#kab_kota_id').html(value.kab_kota.kab_kota)
            $('#kecamatan').html(value.kecamatan)
            let tanggal_approve, nama_supplier, kontak_supplier, image1, image2
            $.each(value.project_items, function(index, value) {
                value.date_approved != null ? tanggal_approve = value.date_approved : tanggal_approve = '-'
                value.supplier_name != null ? nama_supplier = value.supplier_name : nama_supplier = '-'
                value.supplier_contact != null ? kontak_supplier = value.supplier_contact : kontak_supplier = '-'
                value.image1 != null ? image1 = value.image1 : image1 = '-'
                value.image2 != null ? image2 = value.image2 : image2 = '-'
                addItem(value.id, value.item.nama_barang, value.quantity, value.category, value.item.satuan, value.status, value.created_at, tanggal_approve, nama_supplier, kontak_supplier, image1, image2, index + 1)
            })
            $('#form').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_project()
            }, 1000)
        }
    })
}

function addItem(id, name, quantity, category, satuan, status, tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, image1, image2, number) {
    let btn = ''
    if (status == 'pending') {
        btn = `<button class="btn btn-sm btn-success approve ml-2" id="approve${id}" data-id="${id}">Approve</button>`
        success = 'text-warning'
    } else {
        success = 'text-success'
    }

    let cat = ''
    category == 'horizontal' ? cat = 'Horizontal' : cat = 'Vertikal'

    let img = ''
    if (image1 == null && image2 == null) {
    	img = `<a href="${image1}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 1</a>
			<a href="${image2}" target="_blank" class="btn btn-sm btn-outline-primary">Foto 2</a>`
    } else {
    	img = '<div class="font-weight-bold">-</div>'
    }

    let detail = `<div class="form-group">
		<label class="col-form-label">Tanggal Request</label>
		<div class="font-weight-bold">${tanggal_request}</div>
	</div>
	<div class="form-group">
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

	// status == 'pending' ? detail = '' : ''

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
					<div class="text-capitalize ${success}" id="status${id}">${status} ${btn}</div>
					<div class="small text-danger text-capitalize pt-2" data-invalid="${id}"></div>
				</div>
				${detail}
			</div>
		</div>
	</div>`
    $('#data').append(append)
}

$(document).on('click', '.approve', function() {
    let id = $(this).data('id')
    $.ajax({
        url: api_url + 'item/accept/' + id,
        type: 'PATCH',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            if (result.message) {
                $('.small[data-invalid="' + id + '"]').html('Jumlah stok kurang dari permintaan.')
            } else {
                $('#status' + id).html('Accepted')
                $('#status' + id).removeClass('text-warning')
                $('#status' + id).addClass('text-success')
                $('#approve' + id).parents('.form-group').remove()
                $('.small[data-invalid="' + id + '"]').remove()
            }
        }
    })
})

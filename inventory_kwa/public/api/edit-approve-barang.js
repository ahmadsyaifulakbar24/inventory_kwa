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
            let tanggal_approve
            $.each(value.project_items, function(index, value) {
                // console.log(value)
                value.date_approved != null ? tanggal_approve = value.date_approved : tanggal_approve = '-'
                addItem(
                    value.id,
                    value.item.nama_barang,
                    value.quantity,
                    value.category,
                    value.item.satuan,
                    value.status,
                    value.created_at,
                    tanggal_approve,
                    value.image1,
                    value.image2,
                    index + 1
                )
            })
            $('#form-data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                api_project()
            }, 1000)
        }
    })
}

function addItem(id, name, quantity, category, satuan, status, tanggal_request, tanggal_approve, image1, image2, number) {
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
			<div class="btn btn-block btn-primary approve" data-id="${id}">Approve</div>
		</div>`
    } else {
        success = 'text-success'
        detail = `<div class="form-group">
			<label class="col-form-label">Tanggal Approve</label>
			<div class="font-weight-bold">${tanggal_approve}</div>
		</div>
		<div class="form-group">
			<label class="col-form-label">Foto</label>
			<div>${img}</div>
		</div>`
    }

    let cat = ''
    category == 'horizontal' ? cat = 'Horizontal' : cat = 'Vertikal'

    let append = `<div class="form-data" data-item="${id}">
		<div class="form-group row">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-md-4 col-2">
        		<h3 class="number text-center">${number})</h3>
        	</div>
        	<div class="col-md-7 col-9">
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
    $('#modal-approve').modal('show')
})

$('#approve').submit(function(e) {
    buttonLoading()
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')

    let id_item = $(this).data('id')

    fd.delete('image1')
    fd.delete('image2')
    fd.append('image1', front_picture)
    fd.append('image2', back_picture)
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
}

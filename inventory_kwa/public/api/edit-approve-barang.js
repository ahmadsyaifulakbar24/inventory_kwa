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
            console.log(value)
            $('#project_name').html(value.project_name)
            $('#provinsi_id').html(value.provinsi.provinsi)
            $('#kab_kota_id').html(value.kab_kota.kab_kota)
            $('#kecamatan').html(value.kecamatan)
            $.each(value.project_items, function(index, value) {
                addItem(value.id, value.item.nama_barang, value.quantity, value.item.satuan, value.status)
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

function addItem(id, name, quantity, satuan, status) {
	let btn = ''
	let success
    if (status == 'pending') {
        btn = `<button class="btn btn-sm btn-success approve ml-2" id="approve${id}" data-id="${id}">Approve</button>`
        success = 'text-warning'
    } else {
        success = 'text-success'
    }
    let append =
        `<div class="form-data" data-item="${id}">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<label class="col-form-label font-weight-bold">${name}</label>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Request Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<label class="col-form-label font-weight-bold">${quantity} ${satuan}</label>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Status</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="text-capitalize ${success} mt-2" id="status${id}">${status} ${btn}</div>
			</div>
		</div>
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data').append(append)
}

$(document).on('click', '.approve', function() {
    $(this).attr('disabled', true)
    let id = $(this).data('id')
    // alert(id)

    $.ajax({
        url: api_url + 'item/accept/' + id,
        type: 'PATCH',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#status' + id).html('Accepted')
            $('#approve' + id).parents('.form-group').remove()
        }
    })
})

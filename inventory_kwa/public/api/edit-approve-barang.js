let append, appendItem, btn = ''

apiProject()

function apiProject() {
    $.ajax({
        url: api_url + 'project/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            $('#project_name').val(value.project_name)
            $.each(value.project_items, function(index, value) {
                addItem(value.id, value.item.nama_barang, value.quantity, value.item.satuan, value.status)
            })
            $('#form').show()
            $('#loading').addClass('hide')
            $('#submit').attr('disabled', false)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiProject()
            }, 1000)
        }
    })
}

function addItem(id, name, quantity, satuan, status) {
    if (status == 'pending') {
        btn =
        `<div class="form-group row">
			<div class="offset-xl-3 offset-lg-4 offset-md-5 col-xl-5 col-lg-6 col-md-7">
				<button class="btn btn-sm btn-success approve" id="approve${id}" data-id="${id}">Approve</button>
			</div>
		</div>`
    }
    appendItem =
        `<div class="form-data" data-item="${id}">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<input class="form-control" value="${name}" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Request Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<input class="form-control" value="${quantity} ${satuan}" disabled>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Status</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="text-capitalize mt-2" id="status${id}">${status}</div>
			</div>
		</div>
		${btn}
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data').append(appendItem)
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

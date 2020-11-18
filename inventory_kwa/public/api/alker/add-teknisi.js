function apiTeknisi(search) {
    if (search.length > 0) {
        $('#teknisi').show()
	    $('#teknisi').html('')
	    $('#empty').addClass('hide')
        $('#state').addClass('hide')
	    $.ajax({
	        url: api_url + 'employee/get',
	        type: 'GET',
	        data: {
	            search: search
	        },
	        timeout: 5000,
	        beforeSend: function(xhr) {
	            xhr.setRequestHeader("Authorization", "Bearer " + token)
	        },
	        success: function(result) {
	            if (result.data.length > 0) {
	                let append = ''
	                $.each(result.data, function(index, value) {
	                    append = `<div class="btn btn-sm btn-link btn-block font-weight-bold text-dark text-left select-teknisi mt-0 mb-2" data-id="${value.id}" data-name="${value.name}">${value.name}</div>`
	                    $('#teknisi').append(append)
	                })
	            } else {
	                $('#teknisi').hide()
	                $('#empty').removeClass('hide')
	            }
	        },
	        error: function(xhr, status) {
	            setTimeout(function() {
	                apiTeknisi(search)
	            }, 1000)
	        }
	    })
	} else {
        $('#teknisi').hide()
        $('#teknisi').html('')
		$('#empty').addClass('hide')
        $('#state').removeClass('hide')
    }
}

$('#search-teknisi').keyup(delay(function(e) {
    let val = $(this).val()
    apiTeknisi(val)
}, 500))

$(document).on('click', '.select-teknisi', function() {
    let id = $(this).data('id')
    let name = $(this).data('name')
    $('#teknisi_id').data('id',id)
    $('#teknisi_id').html(name)
    $('#modal-teknisi').modal('hide')
})

$('#modal-teknisi').on('show.bs.modal', function(e) {
    apiTeknisi('')
    $('#search-teknisi').val('')
})

$('#modal-teknisi').on('shown.bs.modal', function(e) {
    $('#search-teknisi').focus()
})

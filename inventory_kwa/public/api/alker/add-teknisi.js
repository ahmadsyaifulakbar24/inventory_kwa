function apiTeknisi(search) {
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
            	if(search.length > 0) {
			        $('#teknisi').html('')
			        $('#teknisi').removeClass('hide')
			        $('#empty-teknisi').addClass('hide')
			        $('#state-teknisi').addClass('hide')
                    let append = ''
                    $.each(result.data, function(index, value) {
                        append = `<div class="btn btn-sm btn-link btn-block font-weight-bold text-dark text-left select-teknisi mt-0 mb-2" data-id="${value.id}" data-name="${value.name}">${value.name}</div>`
                        $('#teknisi').append(append)
                    })
	            } else {
			        $('#teknisi').html('')
			        $('#teknisi').addClass('hide')
			        $('#empty-teknisi').addClass('hide')
			        $('#state-teknisi').removeClass('hide')
			    }
            } else {
		        $('#teknisi').html('')
		        $('#teknisi').addClass('hide')
		        $('#empty-teknisi').removeClass('hide')
		        $('#state-teknisi').addClass('hide')
            }
		    $('#loading-teknisi').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiTeknisi(search)
            }, 1000)
        }
    })
}

$('#search-teknisi').keyup(function() {
    let val = $(this).val()
    if (val.length > 0) {
    	apiTeknisi(val)
	    $('#teknisi').html('')
	    $('#teknisi').addClass('hide')
	    $('#state-teknisi').addClass('hide')
	    $('#empty-teknisi').addClass('hide')
	    $('#loading-teknisi').removeClass('hide')
    } else {
	    $('#teknisi').html('')
	    $('#teknisi').addClass('hide')
	    $('#state-teknisi').removeClass('hide')
	    $('#empty-teknisi').addClass('hide')
	    $('#loading-teknisi').addClass('hide')
    }
})
// $('#search-alker').keyup(delay(function(e) {
// }, 0))

$(document).on('click', '.select-teknisi', function() {
    let id = $(this).data('id')
    let name = $(this).data('name')
    $('#teknisi_id').data('id', id)
    $('#teknisi_id').html(name)
    $('#modal-teknisi').modal('hide')
})

$('#modal-teknisi').on('show.bs.modal', function(e) {
    $('#search-teknisi').val('')
    $('#teknisi').html('')
    $('#teknisi').addClass('hide')
    $('#state-teknisi').removeClass('hide')
    $('#empty-teknisi').addClass('hide')
    $('#loading-teknisi').addClass('hide')
})

$('#modal-teknisi').on('shown.bs.modal', function(e) {
    $('#search-teknisi').focus()
})

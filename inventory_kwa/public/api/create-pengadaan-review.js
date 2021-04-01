stop = false

get_supplier()

function get_supplier() {
    $.ajax({
        url: api_url + 'supplier/get',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	// console.log(result)
            let append
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}" data-contact="${value.contact}" data-type="${value.type}">${value.name}</option>`
                $('#supplier_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_supplier()
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
	if (stop == false) {
	    $('#pengadaan').show()
	    $('#loading').remove()
	    add_item()
	    stop = true
	}
})

$('#supplier_id').change(function() {
	let supplier = $(this).find(':selected').html()
    let type = $(this).find(':selected').data('type')
    let contact = $(this).find(':selected').data('contact')
    console.log(contact)
    if (type == 'offline') {
    	if (contact == '00000000') {
	        $('#supplier_contact').parents('.form-group').addClass('hide')
	        $('#url').parents('.form-group').addClass('hide')
	    } else {
	        $('#supplier_contact').html(contact)
	        $('#supplier_contact').parents('.form-group').removeClass('hide')
	        $('#url').parents('.form-group').addClass('hide')
	    }
    } else if (type == 'online') {
	    $('#url').attr('placeholder', `https://www.${supplier.toLowerCase()}.com/supplier`)
        $('#supplier_contact').parents('.form-group').addClass('hide')
        $('#url').parents('.form-group').removeClass('hide')
        $('#url').focus()
    }
    $('.is-invalid').removeClass('is-invalid')
    $('#url').val('')
})

$('#form').submit(function(e) {
    e.preventDefault()
    let error = false
    let pengadaan_review_items = []
    let pengadaan_review_items_check = []
    let supplier_id = $('#supplier_id').val()
    let supplier_type = $('#supplier_id').find(':selected').data('type')
    let url = $('#url').val()
    $('.is-invalid').removeClass('is-invalid')
    $('.form-item').each(function(index, value) {
        pengadaan_review_items.push({
            pengadaan_request_item_id: $('.item_id[data-id="' + (index + 1) + '"]').val(),
            price: number($('.price[data-id="' + (index + 1) + '"]').val())
        })
        pengadaan_review_items_check.push({
            pengadaan_request_item_id: $('.item_id[data-id="' + (index + 1) + '"]').val(),
            price: $('.price[data-id="' + (index + 1) + '"]').val()
        })
    })
    $.each(pengadaan_review_items_check, function(index, value) {
        if (value.pengadaan_request_item_id == null) {
            $('.item_id[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.price == null || value.price == '') {
            $('.price[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
    })
    if (supplier_id == null) {
    	$('#supplier_id').addClass('is-invalid')
    	$('#supplier_id-feedback').html('Pilih supplier')
    	error = true
    } else {
    	if (supplier_type == 'online') {
	    	if (url == '') {
		    	$('#url').addClass('is-invalid')
		    	$('#url-feedback').html('Masukkan link supplier dengan benar')
		    	error = true
	    	}
    	}
    }
    if (error == false) {
        buttonLoading()
        $.ajax({
            url: api_url + 'pengadaan_review/create',
            type: 'POST',
            data: {
                supplier_id: supplier_id,
                url: url,
                pengadaan_review_items: pengadaan_review_items
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                // console.log(result)
                location.href = root + 'pengadaan-review'
            },
            error: function(xhr) {
                removeLoading()
                // let err = JSON.parse(xhr.responseText)
                // console.log(err)
            }
        })
    }
})
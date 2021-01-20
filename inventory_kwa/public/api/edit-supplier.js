get_supplier()

function get_supplier() {
    $.ajax({
        url: api_url + 'supplier/get/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let value = result.data

            $('#name').val(value.name)
            $('#type').val(value.type)
            if (value.type == 'offline') {
            	$('#contact').val(value.contact)
		        $('#contact').parents('.form-group').removeClass('none')
		        $('#url').parents('.form-group').addClass('none')
		    } else {
            	$('#url').val(value.url)
		        $('#contact').parents('.form-group').addClass('none')
		        $('#url').parents('.form-group').removeClass('none')
            }

            $('#form').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_supplier()
            }, 1000)
        }
    })
}

$('#type').change(function() {
    let val = $(this).val()
    if (val == 'offline') {
        $('#contact').parents('.form-group').removeClass('none')
        $('#url').parents('.form-group').addClass('none')
    } else {
        $('#contact').parents('.form-group').addClass('none')
        $('#url').parents('.form-group').removeClass('none')
    }
})

$('#form').submit(function(e) {
    e.preventDefault()
    let name = $('#name').val()
    let type = $('#type').val()
    let contact = $('#contact').val()
    let url = $('#url').val()
    $('.is-invalid').removeClass('is-invalid')

    buttonLoading()
    $.ajax({
        url: api_url + 'supplier/update/' + id,
        type: 'PATCH',
        data: {
        	name: name,
        	type: type,
        	contact: contact,
        	url: url
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            location.href = root + 'supplier'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(err)
            if (err.name) {
                $('#name').addClass('is-invalid')
                $('#name-feedback').html('Masukkan nama supplier.')
            }
            if (err.type) {
                $('#type').addClass('is-invalid')
                $('#type-feedback').html('Pilih tipe supplier.')
            }
            if (err.contact) {
                if (err.contact == "The contact field is required.") {
                    $('#contact').addClass('is-invalid')
                    $('#contact-feedback').html('Masukkan kontak supplier.')
                }
                else if (err.contact == "The contact must be between 8 and 15 digits.") {
                    $('#contact').addClass('is-invalid')
                    $('#contact-feedback').html('Kontak supplier minimal 8 digit sampai 15 digit.')
                }
            }
            if (err.url) {
                if (err.url == "The url field is required.") {
                    $('#url').addClass('is-invalid')
                    $('#url-feedback').html('Masukkan URL.')
                }
                else if (err.url == "The url format is invalid.") {
                    $('#url').addClass('is-invalid')
                    $('#url-feedback').html('Masukkan URL dengan benar.')
                }
            }
        }
    })
})

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
        	$('#contact').val(value.contact)

            if (value.type == 'offline') {
            	$('#contact').val(value.contact)
		        $('#contact').parents('.form-group').removeClass('none')
		    } else {
		        $('#contact').parents('.form-group').addClass('none')
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
    } else {
        $('#contact').parents('.form-group').addClass('none')
    }
})

$('#form').submit(function(e) {
    e.preventDefault()
    let name = $('#name').val()
    let type = $('#type').val()
    let contact = $('#contact').val()
    $('.is-invalid').removeClass('is-invalid')

    buttonLoading()
    $.ajax({
        url: api_url + 'supplier/update/' + id,
        type: 'PATCH',
        data: {
        	name: name,
        	type: type,
        	contact: contact
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
                $('#contact').addClass('is-invalid')
                $('#contact-feedback').html('Masukkan kontak supplier.')
            }
        }
    })
})

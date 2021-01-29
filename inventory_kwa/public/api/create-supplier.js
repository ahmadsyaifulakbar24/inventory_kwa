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

    let fd = new FormData()
    fd.append('name', name)
    fd.append('type', type)
    fd.append('contact', contact)
    // console.clear()
    // console.log(...fd)

    buttonLoading()
    $.ajax({
        url: api_url + 'supplier/create',
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
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

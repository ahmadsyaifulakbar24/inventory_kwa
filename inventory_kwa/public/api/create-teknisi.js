$('#form').submit(function(e) {
    e.preventDefault()
    let name = $('#name').val()
    let nik = $('#nik').val()
    let email = $('#email').val()
    let no_hp = $('#no_hp').val()
    let status = $('#status').val()
    let alamat = $('#alamat').val()
    $('.is-invalid').removeClass('is-invalid')

    buttonLoading()
    $.ajax({
        url: api_url + 'employee/create',
        type: 'POST',
        data: {
            name: name,
            nik: nik,
            email: email,
            no_hp: no_hp,
            status: status,
            alamat: alamat,
            jabatan_id: 29
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            location.href = root + 'teknisi'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(err)
            if (err.name) {
                $('#name').addClass('is-invalid')
                $('#name-feedback').html('Masukkan nama teknisi.')
            }
            if (err.nik) {
                if (err.nik == 'The nik must be 16 digits.') {
                    $('#nik').addClass('is-invalid')
                    $('#nik-feedback').html('NIK minimal 16 digit.')
                } else {
                    $('#nik').addClass('is-invalid')
                    $('#nik-feedback').html('Masukkan NIK dengan benar.')
                }
            }
        }
    })
})

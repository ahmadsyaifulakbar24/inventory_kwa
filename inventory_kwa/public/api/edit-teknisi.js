get_employee_by_id(id)

function get_employee_by_id(id) {
    $.ajax({
        url: api_url + 'employee/get/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let value = result.data

            $('#name').val(value.name)
            $('#nik').val(value.nik)
            $('#email').val(value.email)
            value.no_hp != null && value.no_hp != 0 ? $('#no_hp').val(value.no_hp) : ''
            value.status != null && value.status != '' ? $('#status').val(value.status) : ''
            $('#alamat').val(value.alamat)

            $('#form').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_employee_by_id(id)
            }, 1000)
        }
    })
}

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
        url: api_url + 'employee/update/' + id,
        type: 'PATCH',
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

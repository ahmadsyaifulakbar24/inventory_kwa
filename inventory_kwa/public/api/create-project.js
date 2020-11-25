$('#form').submit(function(e) {
    e.preventDefault()
    let items = []
    let error = false
    let project_name = $('#project_name').val()
    let provinsi_id = $('#provinsi_id').val()
    let kab_kota_id = $('#kab_kota_id').val()
    let kecamatan = $('#kecamatan').val()
    $('.is-invalid').removeClass('is-invalid')
    $('.form-item').each(function(index, value) {
        items.push({
            item_id: $('.item_id[data-id="' + (index + 1) + '"]').val(),
            quantity: $('.quantity[data-id="' + (index + 1) + '"]').val(),
            category: $('.category[data-id="' + (index + 1) + '"]').val()
        })
    })
    $.each(items, function(index, value) {
        if (value.item_id == null) {
            $('.item_id[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.quantity == '') {
            $('.quantity[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.category == null) {
            $('.category[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
    })
    // console.clear()
    // $.each(items, function(index, value) {
    //     console.log(value)
    // })
    if (error == false) {
        buttonLoading()
        $.ajax({
            url: api_url + 'project/create',
            type: 'POST',
            data: {
                project_name: project_name,
                provinsi_id: provinsi_id,
                kab_kota_id: kab_kota_id,
                kecamatan: kecamatan,
                items: items
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                // console.log(result)
                location.href = root + 'project'
            },
            error: function(xhr) {
                removeLoading()
                let err = JSON.parse(xhr.responseText)
                // console.log(err)
                if (err.project_name) {
                    $('#project_name').addClass('is-invalid')
                    $('#project_name-feedback').html('Masukkan nama site/project.')
                }
                if (err.provinsi_id) {
                    $('#provinsi_id').addClass('is-invalid')
                    $('#provinsi_id-feedback').html('Pilih provinsi.')
                }
                if (err.kab_kota_id) {
                    $('#kab_kota_id').addClass('is-invalid')
                    $('#kab_kota_id-feedback').html('Pilih kab/kota.')
                }
                if (err.kecamatan) {
                    $('#kecamatan').addClass('is-invalid')
                    $('#kecamatan-feedback').html('Masukkan kecamatan.')
                }
            }
        })
    }
})

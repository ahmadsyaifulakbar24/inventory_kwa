$('#form').submit(function(e) {
    e.preventDefault()
    let items_u = {}
    let items_n = {}
    let error = false
    let project_name = $('#project_name').val()
    let provinsi_id = $('#provinsi_id').val()
    let kab_kota_id = $('#kab_kota_id').val()
    let kecamatan = $('#kecamatan').val()
    $('.is-invalid').removeClass('is-invalid')
    $('#data-u .item_id').each(function(index, value) {
        items_u[$(this).data('id')] = {
            item_id: $('.item_id[data-id="' + $(this).data('id') + '"]').val(),
            quantity: $('.quantity[data-id="' + $(this).data('id') + '"]').val(),
            category: $('.category[data-id="' + $(this).data('id') + '"]').val()
        }
    })
    $('#data-n .item_id').each(function(index, value) {
        items_n[$(this).data('status') + (index + 1)] = {
            item_id: $('.select-n.item_id[data-id="' + (index + 1) + '"]').val(),
            quantity: $('.input-n.quantity[data-id="' + (index + 1) + '"]').val(),
            category: $('.select-n.category[data-id="' + (index + 1) + '"]').val()
        }
    })
    $.each(items_u, function(index, value) {
    	console.log(index)
        if (value.item_id == null) {
            $('.item_id.select-u[data-id="' + index + '"]').addClass('is-invalid')
            error = true
        }
        if (value.quantity == '') {
            $('.quantity.input-u[data-id="' + index + '"]').addClass('is-invalid')
            error = true
        }
        if (value.category == null) {
            $('.category.select-u[data-id="' + index + '"]').addClass('is-invalid')
            error = true
        }
    })
    $.each(items_n, function(index, value) {
        if (value.item_id == null) {
            $('.select-n.item_id[data-id="' + index.substr(1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.quantity == '') {
            $('.input-n.quantity[data-id="' + index.substr(1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.category == null) {
            $('.select-n.category.select-n[data-id="' + index.substr(1) + '"]').addClass('is-invalid')
            error = true
        }
    })
    // console.clear()
    // console.log(items_u)
    // $.each(items_u, function(index, value) {
    //     console.log(value)
    // })
    // console.log(items_n)
    // $.each(items_n, function(index, value) {
    //     console.log(value)
    // })
    let items = Object.assign({}, items_u, items_n)
    // console.log(items)
    if (error == false) {
        buttonLoading()
        $.ajax({
            url: api_url + 'project/update/' + id,
            type: 'PATCH',
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
            error: function(xhr, status) {
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

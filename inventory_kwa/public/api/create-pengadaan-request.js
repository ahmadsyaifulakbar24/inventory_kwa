stop = false

get_jenis_pengadaan()

function get_jenis_pengadaan() {
    $.ajax({
        url: api_url + 'param/get_jenis_pengadaan',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append
            $.each(result.data, function(index, value) {
                append = `<option value=${value.id}>${value.param}</option>`
                $('#jenis_pengadaan_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_jenis_pengadaan()
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
	if (stop == false) {
	    $('#pengadaan').show()
	    $('#loading').remove()
	    add_alker()
	    stop = true
	}
})

$('#jenis_pengadaan_id').change(function() {
    $('#data').empty()
    let id = $(this).val()
    if (id == '33') {
        $('#alker').removeClass('hide')
        $('#item').addClass('hide')
        add_alker()
    } else {
        $('#alker').addClass('hide')
        $('#item').removeClass('hide')
        add_item()
    }
})

$('#form').submit(function(e) {
    e.preventDefault()
    let error = false
    let pengadaan_request_item = []
    let jenis_pengadaan_id = $('#jenis_pengadaan_id').val()
    $('.is-invalid').removeClass('is-invalid')
    if (jenis_pengadaan_id == '33') {
        $('.form-alker').each(function(index, value) {
            pengadaan_request_item.push({
                main_alker_id: $('.main_alker_id[data-id="' + (index + 1) + '"]').val(),
                total: $('.total[data-id="' + (index + 1) + '"]').val()
            })
        })
    } else {
        $('.form-item').each(function(index, value) {
            pengadaan_request_item.push({
                item_id: $('.item_id[data-id="' + (index + 1) + '"]').val(),
                total: $('.total[data-id="' + (index + 1) + '"]').val()
            })
        })
    }
    $.each(pengadaan_request_item, function(index, value) {
        if (jenis_pengadaan_id == '33' && value.main_alker_id == null) {
            $('.main_alker_id[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
        if (jenis_pengadaan_id == '34' && value.item_id == null) {
            $('.item_id[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
        if (value.total == null || value.total == '') {
            $('.total[data-id="' + (index + 1) + '"]').addClass('is-invalid')
            error = true
        }
    })
    if (error == false) {
        buttonLoading()
        $.ajax({
            url: api_url + 'pengadaan_request/create',
            type: 'POST',
            data: {
                jenis_pengadaan_id: jenis_pengadaan_id,
                pengadaan_request_item: pengadaan_request_item
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                // console.log(result)
                location.href = root + 'pengadaan-request'
            },
            error: function(xhr) {
                removeLoading()
                let err = JSON.parse(xhr.responseText)
                // console.log(xhr)
            }
        })
    }
})

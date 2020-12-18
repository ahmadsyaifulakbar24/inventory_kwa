apiSTO()
apiKegunaan()
apiKeterangan()

function apiSTO() {
    $.ajax({
        url: api_url + 'param/get_sto',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append = ''
            $.each(result.data, function(index, value) {
                append = `<option value=${value.id}>${value.param}</option>`
                $('#sto_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiSTO()
            }, 1000)
        }
    })
}

function apiKegunaan() {
    $.ajax({
        url: api_url + 'param/get_jenis_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append = ''
            $.each(result.data, function(index, value) {
                append = `<option value=${value.param.toLowerCase()}>${value.param.toUpperCase()}</option>`
                $('#kegunaan').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiKegunaan()
            }, 1000)
        }
    })
}

function apiKeterangan() {
    $.ajax({
        url: api_url + 'param/get_keterangan_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append = ''
            $.each(result.data, function(index, value) {
                append = `<option value=${value.id}>${value.param}</option>`
                $('#keterangan_id').append(append)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiKeterangan()
            }, 1000)
        }
    })
}

function get_alker_not_good(id, status) {
    $.ajax({
        url: api_url + 'alker/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            $('#sto_id').val(value.sto.id)
            $('#teknisi_id').data('id', value.teknisi.id)
            $('#teknisi_id').html(value.teknisi.name)
            $('#kegunaan').val(value.kegunaan)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_not_good(id)
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
    $('#form').removeClass('hide')
    $('#loading').addClass('hide')
})

$('#keterangan_id').change(function() {
    let id = $(this).val()
    if (id == 28) {
        $('.form-file').removeClass('hide')
        $('#form_ng').hide()
    } else {
        $('.form-file').addClass('hide')
        $('#form_ng').show()
    }
    $('#alker_disabled').remove()
    $('#alker_id').removeClass('hide')
    $('#alker_id').data('id', null)
    $('#alker_id').html('Pilih')

    $('#sto_id').prop('selectedIndex', 0)
    $('#teknisi_id').data('id', null)
    $('#teknisi_id').html('Pilih')
    $('#kegunaan').prop('selectedIndex', 0)
})

$('#form').submit(function(e) {
    e.preventDefault()
    let alker_id = $('#alker_id').data('id')
    let sto_id = $('#sto_id').val()
    let teknisi_id = $('#teknisi_id').data('id')
    let kegunaan = $('#kegunaan').val()
    let keterangan_id = $('#keterangan_id').val()
    $('.is-invalid').removeClass('is-invalid')

    fd.delete('alker_id')
    fd.delete('sto_id')
    fd.delete('teknisi_id')
    fd.delete('kegunaan')
    fd.delete('keterangan_id')
    fd.delete('front_picture')
    fd.delete('back_picture')

    fd.append('alker_id', alker_id)
    fd.append('sto_id', sto_id)
    fd.append('teknisi_id', teknisi_id)
    fd.append('kegunaan', kegunaan)
    fd.append('keterangan_id', keterangan_id)
    if (keterangan_id == 28) { // No Good
        fd.append('front_picture', front_picture)
        fd.append('back_picture', back_picture)
    }
    // console.clear()
    // console.log(...fd)

    buttonLoading()
    $.ajax({
        url: api_url + 'alker/create_alker_request',
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	// console.log(result)
            location.href = root + 'alker'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(...fd)
            // console.log(err)
            if (err.alker_id) {
                $('#alker_id').addClass('is-invalid')
                $('#alker_id-feedback').html('Pilih alker.')
            }
            if (err.sto_id) {
                $('#sto_id').addClass('is-invalid')
                $('#sto_id-feedback').html('Pilih STO.')
            }
            if (err.teknisi_id) {
                $('#teknisi_id').addClass('is-invalid')
                $('#teknisi_id-feedback').html('Pilih teknisi.')
            }
            if (err.kegunaan) {
                $('#kegunaan').addClass('is-invalid')
                $('#kegunaan-feedback').html('Pilih kegunaan.')
            }
            if (err.keterangan_id) {
                $('#keterangan_id').addClass('is-invalid')
                $('#keterangan_id-feedback').html('Pilih keterangan.')
            }
            if (err.front_picture) {
                $('#front_picture').addClass('is-invalid')
                $('#front_picture-feedback').html('Masukkan foto depan.')
            }
            if (err.back_picture) {
                $('#back_picture').addClass('is-invalid')
                $('#back_picture-feedback').html('Masukkan foto belakang.')
            }
        }
    })
})

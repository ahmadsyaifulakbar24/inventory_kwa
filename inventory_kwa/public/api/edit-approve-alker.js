process()

function process() {
    $.ajax({
        url: api_url + 'alker/get_alker_request/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            $('#btn-reject').attr('data-kode', value.alker.main_alker.kode_main_alker)
            $('#btn-reject').attr('data-alker', value.alker.main_alker.nama_barang)

            $('#kode_main_alker').html(value.alker.main_alker.kode_main_alker)
            $('#nama_barang').html(value.alker.main_alker.nama_barang)
            $('#satuan').html(value.alker.main_alker.satuan)
            $('#kode_alker').html(value.alker.kode_alker)

            let sto, teknisi, kegunaan
            value.sto.sto != null ? sto = value.sto.sto : sto = ''
            value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
            value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
            $('#sto').html(sto)
            $('#teknisi').html(teknisi)
            $('#kegunaan').html(kegunaan)

            value.keterangan.id == '32' ? $('#form_ng').remove() : $('#form').remove()
            $('#keterangan').html(value.keterangan.keterangan)

            if (value.status == 'pending') {
                $('#status').addClass('text-warning')
            } else if (value.status == 'rejected') {
                $('#form').remove()
                $('#form_ng').remove()
                $('#form_reject').remove()
                $('#status').addClass('text-danger')
            } else {
                $('#form').remove()
                $('#form_ng').remove()
                $('#form_reject').remove()
                $('#status').addClass('text-success')
            }
            $('#status').html(value.status)

            value.front_picture == '' || value.front_picture == null ? $('#fp').parent('label').hide() : ''
            value.back_picture == '' || value.back_picture == null ? $('#bp').parent('label').hide() : ''
            value.front_picture != '' && value.back_picture != '' ? $('#form').hide() : ''
            $('#fp').attr('href', value.front_picture)
            $('#bp').attr('href', value.back_picture)

            $('#qrcode').append(`<div id="qrcode${value.id}" class="d-inline-block text-center small"></div>`)
            createQR(value.id, value.alker.kode_alker)
            $('#qrcode' + value.id).append(`<b>${value.alker.kode_alker}</b>`)

            $('#data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                process()
            }, 1000)
        }
    })
}

$('#form').submit(function(e) {
    buttonLoading()
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')

    fd.delete('front_picture')
    fd.delete('back_picture')
    fd.append('front_picture', front_picture)
    fd.append('back_picture', back_picture)

    $.ajax({
        url: api_url + 'alker/accept_alker/' + id,
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'approve-alker/' + id
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(...fd)
            // console.log(err)
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

$('#form_ng').submit(function(e) {
    buttonLoading()
    e.preventDefault()
    $.ajax({
        url: api_url + 'alker/accept_alker/' + id,
        type: 'POST',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'approve-alker/' + id
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(err)
        }
    })
})

$(document).on('click', '#btn-reject', function() {
    let id = $(this).data('id')
    let kode = $(this).data('kode')
    let alker = $(this).data('alker')
    $('#reject').attr('data-id', id)
    $('#modal-reject').modal('show')
    $('.modal-body').html(`Anda yakin ingin membatalkan request <b>${kode}</b> (${alker})?`)
})

$(document).on('click', '#reject', function() {
    $('#reject').attr('disabled', true)
    $.ajax({
        url: api_url + 'alker/reject_alker_request/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'approve-alker/' + id
        }
    })
})

function apiAlker(search) {
    let status
    let keterangan_id = $('#keterangan_id').val()
    keterangan_id == 28 ? status = 'out' : status = 'in'
    $.ajax({
        url: api_url + 'alker/get',
        type: 'GET',
        data: {
            status: status,
            kode_alker: search
        },
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            if (result.data.length > 0) {
                if (search.length > 0) {
                    $('#alker').html('')
                    $('#alker').removeClass('hide')
                    $('#empty-alker').addClass('hide')
                    $('#state-alker').addClass('hide')
                    let append = ''
                    $.each(result.data, function(index, value) {
                        append = `<div class="btn btn-sm btn-link btn-block font-weight-bold text-dark text-left select-alker mt-0 mb-2" data-id="${value.id}" data-kode="${value.kode_alker}" data-name="${value.main_alker.nama_barang}">${value.kode_alker} <span class="text-secondary">- ${value.main_alker.nama_barang}</span></div>`
                        $('#alker').append(append)
                    })
                } else {
                    $('#alker').html('')
                    $('#alker').addClass('hide')
                    $('#empty-alker').addClass('hide')
                    $('#state-alker').removeClass('hide')
                }
            } else {
                $('#alker').html('')
                $('#alker').addClass('hide')
                $('#empty-alker').removeClass('hide')
                $('#state-alker').addClass('hide')
            }
            $('#loading-alker').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiAlker(search)
            }, 1000)
        }
    })
}

$('#search-alker').keyup(function() {
    let val = $(this).val()
    if (val.length > 0) {
        $('#alker').html('')
        $('#alker').addClass('hide')
        $('#state-alker').addClass('hide')
        $('#empty-alker').addClass('hide')
        $('#loading-alker').removeClass('hide')
    } else {
        $('#alker').html('')
        $('#alker').addClass('hide')
        $('#state-alker').removeClass('hide')
        $('#empty-alker').addClass('hide')
        $('#loading-alker').addClass('hide')
    }
})
$('#search-alker').keyup(delay(function(e) {
    let val = $(this).val()
    apiAlker(val)
}, 500))

$(document).on('click', '.select-alker', function() {
    let id = $(this).data('id')
    let kode = $(this).data('kode')
    let name = $(this).data('name')
    $('#alker_id').data('id', id)
    $('#alker_id').html(kode + ' - ' + name)
    $('#modal-alker').modal('hide')
    let keterangan_id = $('#keterangan_id').val()
    keterangan_id == 28 ? get_alker_request(id) : ''
})

$('#modal-alker').on('show.bs.modal', function(e) {
    $('#search-alker').val('')
    $('#alker').html('')
    $('#alker').addClass('hide')
    $('#state-alker').removeClass('hide')
    $('#empty-alker').addClass('hide')
    $('#loading-alker').addClass('hide')
})

$('#modal-alker').on('shown.bs.modal', function(e) {
    $('#search-alker').focus()
})

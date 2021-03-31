get_alker_request(1)

function get_alker_request(page) {
    $.ajax({
        url: api_url + 'alker/get_alker_request',
        type: 'GET',
        data: {
            page: page
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
            $('#pagination').show()
            $('#loading_data_get_alker_request').hide()
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, color, front, back, sto, teknisi, kegunaan
                let from = result.meta.from
                $.each(result.data, function(index, value) {
                    value.sto.sto != null ? sto = value.sto.sto : sto = ''
                    value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
                    value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
                    value.front_picture == '' ? front = 'd-none' : front = 'd-block'
                    value.back_picture == '' ? back = 'd-none' : back = 'd-block'
                    if (value.status == 'accepted') {
                        color = 'text-success'
                    } else if (value.status == 'pending') {
                        color = 'text-warning'
                    } else {
                        color = 'text-danger'
                    }
                    append = `<tr data-id="${value.id}" data-alker="${value.alker.kode_alker}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate"><a href="${root}approve-alker/${value.id}">${value.alker.kode_alker}</a></td>
						<td class="text-truncate">${value.alker.main_alker.nama_barang}</td>
						<td>${sto}</td>
						<td class="text-truncate">${teknisi}</td>
						<td>${kegunaan}</td>
						<td class="text-truncate">${value.keterangan.keterangan}</td>
						<td class="text-capitalize ${color}">${value.status}</td>
						<td><a href="${value.front_picture}" class="btn btn-sm btn-outline-primary text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="btn btn-sm btn-outline-primary text-truncate ${back}" target="_blank">Belakang</a></td>
					</tr>`
                    $('#data_get_alker_request').append(append)
                    from++
                })
                pagination(result.links, result.meta, result.meta.path)
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_request(page)
            }, 1000)
        }
    })
}

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#pagination').hide()
        $('#loading_data_get_alker_request').show()
        $('#data_get_alker_request').html('')
        get_alker_request(page)
    }
})

get_alker_request_by_group()

function get_alker_request_by_group() {
    $.ajax({
        url: api_url + 'alker/get_alker_request_by_group/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, color, front, back, sto, teknisi, kegunaan
                let from = 1
                $.each(result.data, function(index, value) {
                    if (index == 0) {
                        $('#kode_alker').html(value.alker.kode_alker)
                        $('#alker').html(value.alker.main_alker.nama_barang)
                        $('title').prepend(value.alker.kode_alker)
                    }
                    value.front_picture == '' || value.front_picture == null ? front = 'd-none' : front = 'd-block'
                    value.back_picture == '' || value.back_picture == null ? back = 'd-none' : back = 'd-block'
                    value.sto.sto != null ? sto = value.sto.sto : sto = ''
                    value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
                    value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
                    if (value.status == 'accepted') {
                        color = 'text-success'
                    } else if (value.status == 'pending') {
                        color = 'text-warning'
                    } else {
                        color = 'text-danger'
                    }
                    append = `<tr data-id="${value.id}" data-alker="${value.alker.kode_alker}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate"><a href="${root}alker/detail/${btoa(value.alker.kode_alker)}">${teknisi}</a></td>
						<td>${sto}</td>
						<td>${kegunaan}</td>
						<td class="text-truncate">${value.keterangan.keterangan}</td>
						<td class="text-capitalize ${color}">${value.status}</td>
						<td><a href="${value.front_picture}" class="btn btn-sm btn-outline-primary text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="btn btn-sm btn-outline-primary text-truncate ${back}" target="_blank">Belakang</a></td>
					</tr>`
                    $('#data_get_alker_request_by_group').append(append)
                    from++
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_request_by_group()
            }, 1000)
        }
    })
}

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
                let append, status, front, back, del, sto, teknisi, kegunaan
                $.each(result.data, function(index, value) {
                    if (index == 0) {
                        $('#nama_barang').html(value.alker.main_alker.nama_barang)
                        $('title').prepend(value.alker.main_alker.nama_barang)
                    }
                	value.front_picture == '' || value.front_picture == null ? front = 'd-none' : front = 'd-block'
                	value.back_picture == '' || value.back_picture == null ? back = 'd-none' : back = 'd-block'
                	value.sto.sto != null ? sto = value.sto.sto : sto = ''
                	value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
                	value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
                    if(value.status == 'accepted') {
                    	status = 'Disetujui'
                    	success = 'text-success'
                    	del = ''
                    } else {
                    	status = value.status
                    	success = 'text-warning'
                    	del = '<i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i>'
                    }
                    append =
                        `<tr data-id="${value.id}" data-alker="${value.alker.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}alker/detail/${btoa(value.alker.kode_alker)}">${value.alker.kode_alker}</a></td>
						<td>${sto}</td>
						<td class="text-truncate">${teknisi}</td>
						<td>${kegunaan}</td>
						<td class="text-truncate">${value.keterangan.keterangan}</td>
						<td class="text-capitalize ${success}">${status}</td>
						<td><a href="${value.front_picture}" class="btn btn-sm btn-outline-primary text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="btn btn-sm btn-outline-primary text-truncate ${back}" target="_blank">Belakang</a></td>
						<!--<td>${del}</td>-->
					</tr>`
                    $('#data_get_alker_request_by_group').append(append)
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

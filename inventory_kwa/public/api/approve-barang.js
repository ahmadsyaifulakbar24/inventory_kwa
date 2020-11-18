apiProject()

function apiProject() {
    $.ajax({
        url: api_url + 'project/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let val = result.data
            $('#loading').addClass('hide')
            if (val.length > 0) {
                $('#data').removeClass('hide')
                let append, nama_barang, quantity, status
                $.each(result.data, function(index, value) {
                    kode_barang = ''
                    nama_barang = ''
                    quantity = ''
                    status = ''
                    $.each(value.project_items, function(index, value) {
                        kode_barang += '<li class="text-truncate">' + value.item.kode + '</li>'
                        nama_barang += '<li class="text-truncate">' + value.item.nama_barang + '</li>'
                        quantity += value.quantity + ' ' + value.item.satuan + '<br>'
                        status += value.status + '<br>'
                    })
                    append =
                    `<tr data-id="${value.id}" data-project="${value.project_name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}approve-barang/${value.id}">${value.project_name}</a></td>
						<td>${kode_barang}</td>
						<td>${nama_barang}</td>
						<td>${quantity}</td>
						<td class="text-capitalize">${status}</td>
						<td><a href="${root}approve-barang/${value.id}" class="text-dark"><i class="mdi mdi-18px mdi-pencil-outline"></i></a></td>
					</tr>`
                    $('#dataTable').append(append)
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiProject()
            }, 1000)
        }
    })
}

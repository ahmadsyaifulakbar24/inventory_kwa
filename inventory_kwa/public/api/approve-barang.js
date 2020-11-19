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
                let append, nama_barang, quantity, status, stok, danger, success
                $.each(result.data, function(index, value) {
                    kode_barang = ''
                    nama_barang = ''
                    quantity = ''
                    status = ''
                    stok = ''
                    $.each(value.project_items, function(index, value) {
                        value.item.stock < 5 ? danger = 'text-danger' : danger = ''
                        value.status == 'accepted' ? success = 'text-success' : success = 'text-warning'
                        kode_barang += '<li class="text-truncate">' + value.item.kode + '</li>'
                        nama_barang += '<span class="d-block text-truncate">' + value.item.nama_barang + '</span>'
                        quantity += '<span class="d-block text-truncate">' + value.quantity + ' ' + value.item.satuan + '</span>'
                        stok += '<span class="d-block text-truncate ' + danger + '">' + value.item.stock + ' ' + value.item.satuan + '</span>'
                        status += '<span class="d-block text-truncate ' + success + '">' + value.status + '<br>'
                    })
                    append =
                    `<tr data-id="${value.id}" data-project="${value.project_name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}approve-barang/${value.id}">${value.project_name}</a></td>
						<td>${kode_barang}</td>
						<td>${nama_barang}</td>
						<td>${quantity}</td>
						<td>${stok}</td>
						<td class="text-capitalize">${status}</td>
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

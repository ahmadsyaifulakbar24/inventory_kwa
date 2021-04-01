get_data()

function get_data(page) {
    $.ajax({
        url: api_url + 'pengadaan_request',
        type: 'GET',
        data: {
            page: page
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            if (result.data.length > 0) {
                $('#data').show()
                $('#loading').hide()
                let append, table_middle, link, jenis_pengadaan, nama_barang, total, status, trash
                let from = result.meta.from
                // let link_status = []
                $.each(result.data, function(index, value) {
                    link_status = []
                    nama_barang = ''
                    total = ''
                    status = ''
                    trash = ''
                	value.pengadaan_request_item.length == 1 ? table_middle = 'table-middle' : table_middle = ''
                    $.each(value.pengadaan_request_item, function(index, values) {
	                    if (value.jenis_pengadaan.id == 33) {
	                        nama_barang += `<li class="text-truncate">${values.main_alker.nama_barang}</li>`
                            total += `<span class="d-block text-truncate">${values.total} ${values.main_alker.satuan}</span>`
                        } else {
	                        nama_barang += `<li class="text-truncate">${values.item_id.nama_barang}</li>`
                            total += `<span class="d-block text-truncate">${values.total} ${values.item_id.satuan}</span>`
                        }
                        status += `<span class="d-block text-truncate">${status_pengadaan(values.status)}</span>`
                        link_status.push(values.status)
                    })
                    if (link_status.includes('selected') || link_status.includes('approve') || link_status.includes('decline')) {
                        link = value.jenis_pengadaan.param
                    } else {
                    	if (level == 102) {
	                        link = `<a href="${root}pengadaan-request/${value.id}">${value.jenis_pengadaan.param}</a>`
	                        trash = `<i class="mdi mdi-18px mdi-trash-can-outline close trash"></i>`
	                    } else {
	                    	link = value.jenis_pengadaan.param
	                    	trash = ``
	                    }
                    }
                    append += `<tr class="${table_middle}" data-id="${value.id}" data-project="${value.jenis_pengadaan.param}">
						<td class="text-center">${from}.</td>
						<td>${link}</td>
						<td>${nama_barang}</td>
						<td>${total}</td>
						<td>${status}</td>
						<td class="text-truncate">${value.created_at.substr(0, 10)}</td>
						<td>${trash}</td>
					</tr>`
                    from++
                })
                $('#table').html(append)
                pagination(result.links, result.meta, result.meta.path)
            } else {
                $('#data').hide()
                $('#empty').show()
                $('#loading').hide()
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_data(page)
            }, 1000)
        }
    })
}

$(document).on('click', '.page', function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#data').hide()
        $('#loading').show()
        get_data(page)
    }
})

let del
$(document).on('click', '.trash', function() {
    del = $(this).closest('tr').data('id')
    $('#delete').data('id', del)
    $('#modal-delete').modal('show')
})

$('#delete').click(function() {
    $('#delete').attr('disabled', true)
    $.ajax({
        url: api_url + 'pengadaan_request/delete/' + del,
        type: 'DELETE',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            get_data()
		    $('#modal-delete').modal('hide')
            $('#delete').attr('disabled', false)
        }
    })
})

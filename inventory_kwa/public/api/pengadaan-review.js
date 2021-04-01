get_data(level)

function get_data(level, page) {
    $.ajax({
        url: api_url + 'pengadaan_review/get',
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
                let append_warehouse, append_dirtek, append_dirut, table_middle
                let contact_supplier, jenis_pengadaan, nama_barang, total, price, kuitansi, bukti_transfer, finish
                let from = result.meta.from
                $.each(result.data, function(index, value) {
                	value.pengadaan_review_items.length == 1 ? table_middle = 'table-middle' : table_middle = ''
                    if (value.supplier_id.type == 'offline') {
				    	if (value.supplier_id.contact == '00000000') {
	                    	contact_supplier = ''
	                    } else {
	                    	contact_supplier = value.supplier_id.contact
	                    }
                    } else if (value.supplier_id.type == 'online') {
	                    	contact_supplier = `<a href="${value.url}" target="_blank">Link Supplier</a>`
	                    }
                    nama_barang = ''
                    total = ''
                    price = ''
                    $.each(value.pengadaan_review_items, function(index, value) {
                        if (value.pengadaan_request_item.main_alker != null) {
                            nama_barang += `<li class="text-truncate">${value.pengadaan_request_item.main_alker.nama_barang} </li>`
                            total += `<span class="d-block text-truncate">${value.pengadaan_request_item.total} ${value.pengadaan_request_item.main_alker.satuan}</span>`
                            price += `<span class="d-block text-truncate">${rupiah(value.price)}</span>`
                        } else {
                            nama_barang += `<li class="text-truncate">${value.pengadaan_request_item.item_id.nama_barang}</li>`
                            total += `<span class="d-block text-truncate">${value.pengadaan_request_item.total} ${value.pengadaan_request_item.item_id.satuan}</span>`
                            price += `<span class="d-block text-truncate">${rupiah(value.price)}</span>`
                        }
                    })
                    if (value.first_approved_at != null) {
                        first_approved_at = value.first_approved_at.substr(0, 10)
                    } else {
                        if (level == 103) {
                            first_approved_at = `<button class="btn btn-sm btn-primary approve" data-approve="first">Approve</button>`
                        } else {
                            first_approved_at = ``
                        }
                    }
                    if (value.second_approved_at != null) {
                        second_approved_at = value.second_approved_at.substr(0, 10)
                    } else {
                        if (level == 104) {
                        	if (value.first_approved_at != null) {
	                            second_approved_at = `<button class="btn btn-sm btn-primary approve" data-approve="second">Approve</button>`
	                        } else {
	                        	second_approved_at = ``
	                        }
                        } else {
                            second_approved_at = ``
                        }
                    }
                    if (level == 103) {
                        bukti_transfer = ``
                        kuitansi = ``
                    } else {
                    	if (value.first_approved_at != null && value.second_approved_at != null) {
	                        bukti_transfer = `<button class="btn btn-sm btn-primary px-3 upload" data-type="36">Upload</button>`
	                        kuitansi = `<button class="btn btn-sm btn-primary px-3 upload" data-type="35">Upload</button>`
	                    } else {
	                        bukti_transfer = ``
	                        kuitansi = ``
	                    }
                    }
                    if (value.pengadaan_review_files != '') {
                        $.each(value.pengadaan_review_files, function(index, value) {
                            if (value.type_file.id == 35) {
                                kuitansi = `<a href="${value.file}" class="btn btn-sm btn-outline-primary px-4" target="_blank">Lihat</a>`
                            } else {
                                bukti_transfer = `<a href="${value.file}" class="btn btn-sm btn-outline-primary px-4" target="_blank">Lihat</a>`
                            }
                        })
                    }
                    if (value.status != 'processed') {
                        finish = ''
                    } else {
                        finish = '<button class="btn btn-sm btn-primary px-3 finish">Selesai</button>'
                    }
                    append_warehouse += `<tr data-id="${value.id}" class="${table_middle}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate">${value.supplier_id.name}</td>
						<td class="text-truncate">${contact_supplier}</td>
						<td class="text-truncate">${nama_barang}</td>
						<td class="text-truncate">${total}</td>
						<td class="text-truncate">${price}</td>
						<td class="text-truncate" id="status${value.id}">${status_pengadaan(value.status)}</td>
						<td class="text-truncate">${value.created_at.substr(0, 10)}</td>
						<td class="text-truncate" id="first_approved_at${value.id}">${first_approved_at}</td>
						<td class="text-truncate" id="second_approved_at${value.id}">${second_approved_at}</td>
						<td class="text-truncate" id="bukti-transfer${value.id}">${bukti_transfer}</td>
						<td class="text-truncate" id="kuitansi${value.id}">${kuitansi}</td>
						<td class="text-truncate" id="finish${value.id}">${finish}</td>
					</tr>`
                    append_dirtek += `<tr data-id="${value.id}" class="${table_middle}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate">${value.supplier_id.name}</td>
						<td class="text-truncate">${contact_supplier}</td>
						<td class="text-truncate">${nama_barang}</td>
						<td class="text-truncate">${total}</td>
						<td class="text-truncate">${price}</td>
						<td>${status_pengadaan(value.status)}</td>
						<td class="text-truncate">${value.created_at.substr(0, 10)}</td>
						<td class="text-truncate" id="first_approved_at${value.id}">${first_approved_at}</td>
						<td class="text-truncate" id="second_approved_at${value.id}">${second_approved_at}</td>
						<td class="text-truncate">${bukti_transfer}</td>
						<td class="text-truncate">${kuitansi}</td>
					</tr>`
                    append_dirut += `<tr data-id="${value.id}" class="${table_middle}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate">${value.supplier_id.name}</td>
						<td class="text-truncate">${contact_supplier}</td>
						<td class="text-truncate">${nama_barang}</td>
						<td class="text-truncate">${total}</td>
						<td class="text-truncate">${price}</td>
						<td class="text-truncate">${status_pengadaan(value.status)}</td>
						<td class="text-truncate">${value.created_at.substr(0, 10)}</td>
						<td class="text-truncate" id="first_approved_at${value.id}">${first_approved_at}</td>
						<td class="text-truncate" id="second_approved_at${value.id}">${second_approved_at}</td>
					</tr>`
                    from++
                })
                if (level == 101) {
                    $('#table').html(append_warehouse)
                    $('#dirtek').remove()
                    $('#dirut').remove()
                } else if (level == 103) {
                    $('#table').html(append_dirtek)
                    $('#warehouse').remove()
                    $('#dirut').remove()
                } else if (level == 104) {
                    $('#table').html(append_dirut)
                    $('#warehouse').remove()
                    $('#dirtek').remove()
                }
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

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#data').hide()
        $('#loading').show()
        get_data(level, page)
    }
})

$(document).on('click', '.approve', function() {
    $('#modal-approve').modal('show')
    let id = $(this).parents('tr').data('id')
    let approve = $(this).data('approve')
    $('#approve').data('id', id)
    $('#approve').data('approve', approve)
})
$(document).on('click', '#approve', function() {
    $(this).attr('disabled', true)
    let id = $(this).data('id')
    let approve = $(this).data('approve')
    $.ajax({
        url: api_url + 'pengadaan_review/approve/' + id,
        type: 'POST',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	if (approve == 'first') {
	            $('#first_approved_at' + id).html(result.data.first_approved_at.substr(0, 10))
        	} else {
	            $('#second_approved_at' + id).html(result.data.second_approved_at.substr(0, 10))
        	}
            $('#approve').attr('disabled', false)
            $('#modal-approve').modal('hide')
        }
    })
})

$(document).on('click', '.upload', function() {
    let id = $(this).parents('tr').data('id')
    let type = $(this).data('type')
    $('#upload').data('id', id)
    $('#upload').data('type', type)
    $('#modal-upload').modal('show')
    if (type == 35) {
    	$('#modal-upload-title').html('Upload Kuitansi')
    } else {
    	$('#modal-upload-title').html('Upload Bukti Transfer')
	}
})
$(document).on('click', '#upload', function(e) {
	e.preventDefault()
    $(this).attr('disabled', true)
    let id = $(this).data('id')
    let type = $(this).data('type')
    let fd = new FormData()
    fd.append('type_file_id', type)
    fd.append('file', file)
    $.ajax({
        url: api_url + 'pengadaan_review/upload_file/' + id,
        type: 'POST',
        data: fd,
	    processData: false,
	    contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let length = result.data.pengadaan_review_files.length - 1
            let href = result.data.pengadaan_review_files[length].file
            if (type == 35) {
	            $('#kuitansi' + id).html(`<a href="${href}" class="btn btn-sm btn-outline-primary px-4" target="_blank">Lihat</a>`)
            } else {
	            $('#bukti-transfer' + id).html(`<a href="${href}" class="btn btn-sm btn-outline-primary px-4" target="_blank">Lihat</a>`)
            }
            $('#modal-upload').modal('hide')
        },
        error: function(xhr) {
            let err = JSON.parse(xhr.responseText)
            if (err.file) {
                $('#file').addClass('is-invalid')
                if (type == 35) {
	                $('#file-feedback').html('Masukkan foto kuitansi')
                } else {
	                $('#file-feedback').html('Masukkan foto bukti transfer')
                }
            }
        },
        complete: function() {
            $('#upload').attr('disabled', false)
        }
    })
})
$('#modal-upload').on('hidden.bs.modal', function(e) {
	$(this).find('#file').removeClass('is-invalid')
	$(this).find('.mdi-staging').click()
})

$(document).on('click', '.finish', function() {
    $('#modal-finish').modal('show')
    let id = $(this).parents('tr').data('id')
    $('#finish').data('id', id)
})
$(document).on('click', '#finish', function() {
    $(this).attr('disabled', true)
    let id = $(this).data('id')
    $.ajax({
        url: api_url + 'pengadaan_review/finish/' + id,
        type: 'PATCH',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#finish' + id).empty()
            $('#status' + id).html(status_pengadaan(result.data.status))
            $('#finish').attr('disabled', false)
            $('#modal-finish').modal('hide')
        }
    })
})

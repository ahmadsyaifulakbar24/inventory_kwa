get_project()

function get_project(page) {
    $.ajax({
        url: api_url + 'project/get',
        type: 'GET',
        data: {
            page: page
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#table').html('')
            $('#loading').addClass('hide')
            $('#table-empty').addClass('hide')
            $('#table-loading').addClass('hide')
            $('#table-data-loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                $('#table-container').removeClass('hide')
                let append, nama_barang, quantity, category, stok, status, danger, success, approve, del
                let tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, image1, image2
                $.each(result.data, function(index, value) {
                    kode_barang = ''
                    nama_barang = ''
                    quantity = ''
                    category = ''
                    status = ''
                    stok = ''
                    tanggal_request = ''
                    tanggal_approve = ''
                    nama_supplier = ''
                    kontak_supplier = ''
                    image1 = ''
                    image2 = ''
                    $.each(value.project_items, function(index, value) {
                        value.item.stock < 5 ? danger = 'text-danger' : danger = ''
                        value.status == 'accepted' ? success = 'text-success' : success = 'text-warning'
                        kode_barang += '<li class="text-truncate">' + value.item.kode + '</li>'
                        nama_barang += '<span class="d-block text-truncate">' + value.item.nama_barang + '</span>'
                        quantity += '<span class="d-block text-truncate">' + value.quantity + ' ' + value.item.satuan + '</span>'
                        value.category == 'horizontal' ? category += '<span class="d-block text-truncate">Horizontal</span>' : category += '<span class="d-block text-truncate">Vertikal</span>'
                        stok += '<span class="d-block text-truncate ' + danger + '">' + value.item.stock + ' ' + value.item.satuan + '</span>'
                        status += '<span class="d-block text-truncate ' + success + '">' + value.status + '<br>'
                        tanggal_request += '<span class="d-block text-truncate">' + value.created_at + '</span>'
                        value.date_approved == null ? '' : tanggal_approve += '<span class="d-block text-truncate">' + value.date_approved + '</span>'
                        value.supplier_name == null ? '' :nama_supplier += '<span class="d-block text-truncate">' + value.supplier_name + '</span>'
                        value.supplier_contact == null ? '' :kontak_supplier += '<span class="d-block text-truncate">' + value.supplier_contact + '</span>'
                        value.image1 == null ? '' :image1 += '<span class="d-block text-truncate"><a href="' + value.image1+ '" target="_blank">Foto 1</a></span>'
                        value.image2 == null ? '' :image2 += '<span class="d-block text-truncate"><a href="' + value.image2+ '" target="_blank">Foto 2</a></span>'
                    })
                    append =
                        `<tr data-id="${value.id}" data-project="${value.project_name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}approve-barang/${value.id}">${value.project_name}</a></td>
						<td>${kode_barang}</td>
						<td>${nama_barang}</td>
						<td>${quantity}</td>
						<td>${category}</td>
						<td>${stok}</td>
						<td class="text-capitalize">${status}</td>
						<td>${tanggal_request}</td>
						<td>${tanggal_approve}</td>
						<td>${nama_supplier}</td>
						<td>${kontak_supplier}</td>
						<td>${image1}</td>
						<td>${image2}</td>
					</tr>`
                    $('#table').append(append)
                })
                pagination(result.links, result.meta, result.meta.path)
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_project()
            }, 1000)
        }
    })
}

let formData = new FormData()
$('#search').keyup(function(e) {
    let param = $(this).val()
    let keyCode = e.originalEvent.keyCode
    if (keyCode >= 48 && keyCode <= 90 || keyCode == 8) {
        $('#table').html('')
        $('#table-loading').removeClass('hide')
        $('#table-container').addClass('hide')
        $('#table-empty').addClass('hide')
        $('#pagination').addClass('hide')
        param.length != 0 ? $('#search-close').removeClass('hide') : $('#search-close').addClass('hide')
    }
})
$('#search').keyup(delay(function(e) {
    let param = $(this).val()
    let keyCode = e.originalEvent.keyCode
    if (keyCode >= 48 && keyCode <= 90 || keyCode == 8) {
        param.length != 0 ? search_project(param) : get_project()
    }
}, 500))
$('#search-close').click(function() {
    $('#search').val('')
    $(this).addClass('hide')
    get_project()
})

function search_project(param) {
    formData.delete('search')
    formData.append('search', param)
    $.ajax({
        url: api_url + 'project/search',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#table').html('')
            $('#table-loading').addClass('hide')
            $('#table-data-loading').addClass('hide')
            if (result.data.length > 0) {
                $('#table-container').removeClass('hide')
                let append, nama_barang, quantity, category, stok, status, danger, success, approve, del, sta = []
                let tanggal_request, tanggal_approve, nama_supplier, kontak_supplier, image1, image2
                $.each(result.data, function(index, value) {
                    sta = []
                    kode_barang = ''
                    nama_barang = ''
                    quantity = ''
                    category = ''
                    status = ''
                    stok = ''
                    tanggal_request = ''
                    tanggal_approve = ''
                    nama_supplier = ''
                    kontak_supplier = ''
                    image1 = ''
                    image2 = ''
                    $.each(value.project_items, function(index, value) {
                        value.item.stock < 5 ? danger = 'text-danger' : danger = ''
                        value.status == 'accepted' ? success = 'text-success' : success = 'text-warning'
                        kode_barang += '<li class="text-truncate">' + value.item.kode + '</li>'
                        nama_barang += '<span class="d-block text-truncate">' + value.item.nama_barang + '</span>'
                        quantity += '<span class="d-block text-truncate">' + value.quantity + ' ' + value.item.satuan + '</span>'
                        value.category == 'horizontal' ? category += '<span class="d-block text-truncate">Horizontal</span>' : category += '<span class="d-block text-truncate">Vertikal</span>'
                        stok += '<span class="d-block text-truncate ' + danger + '">' + value.item.stock + ' ' + value.item.satuan + '</span>'
                        status += '<span class="d-block text-truncate ' + success + '">' + value.status + '</span>'
                        tanggal_request += '<span class="d-block text-truncate">' + value.created_at + '</span>'
                        value.date_approved == null ? '' : tanggal_approve += '<span class="d-block text-truncate">' + value.date_approved + '</span>'
                        value.supplier_name == null ? '' :nama_supplier += '<span class="d-block text-truncate">' + value.supplier_name + '</span>'
                        value.supplier_contact == null ? '' :kontak_supplier += '<span class="d-block text-truncate">' + value.supplier_contact + '</span>'
                        value.image1 == null ? '' :image1 += '<span class="d-block text-truncate"><a href="' + value.image1+ '" target="_blank">Foto 1</a></span>'
                        value.image2 == null ? '' :image2 += '<span class="d-block text-truncate"><a href="' + value.image2+ '" target="_blank">Foto 2</a></span>'
                    })
                    append =
                        `<tr data-id="${value.id}" data-project="${value.project_name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}approve-barang/${value.id}">${value.project_name}</a></td>
						<td>${kode_barang}</td>
						<td>${nama_barang}</td>
						<td>${quantity}</td>
						<td>${category}</td>
						<td>${stok}</td>
						<td class="text-capitalize">${status}</td>
						<td>${tanggal_request}</td>
						<td>${tanggal_approve}</td>
						<td>${nama_supplier}</td>
						<td>${kontak_supplier}</td>
						<td>${image1}</td>
						<td>${image2}</td>
					</tr>`
                    $('#table').append(append)
                })
            } else {
                $('#table-empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                search_project(param)
            }, 1000)
        }
    })
}

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#pagination').addClass('hide')
        $('#table-data-loading').removeClass('hide')
        get_project(page)
    }
})


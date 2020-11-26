apiProject()

function apiProject() {
    $.ajax({
        url: api_url + 'project/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let s = []
                let append, nama_barang, quantity, category, status, stok, danger, success, del
                $.each(result.data, function(index, value) {
                    kode_barang = ''
                    nama_barang = ''
                    quantity = ''
                    category = ''
                    status = ''
                    stok = ''
                    $.each(value.project_items, function(index, value) {
                        value.item.stock < 5 ? danger = 'text-danger' : danger = ''
                        value.status == 'accepted' ? success = 'text-success' : success = 'text-warning'
                        kode_barang += '<li class="text-truncate">' + value.item.kode + '</li>'
                        nama_barang += '<span class="d-block text-truncate">' + value.item.nama_barang + '</span>'
                        quantity += '<span class="d-block text-truncate">' + value.quantity + ' ' + value.item.satuan + '</span>'
                        value.category == 'horizontal' ? category += '<span class="d-block text-truncate">Horizontal</span>' : category += '<span class="d-block text-truncate">Vertikal</span>'
                        stok += '<span class="d-block text-truncate ' + danger + '">' + value.item.stock + ' ' + value.item.satuan + '</span>'
                        status += '<span class="d-block text-truncate ' + success + '">' + value.status + '</span>'
                        s.push(value.status)
                    })
                    s.includes('accepted') ? del = '' : del = '<i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i>'
                    append =
                        `<tr data-id="${value.id}" data-project="${value.project_name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}project/${value.id}">${value.project_name}</a></td>
						<td>${kode_barang}</td>
						<td>${nama_barang}</td>
						<td>${quantity}</td>
						<td>${category}</td>
						<td>${stok}</td>
						<td class="text-capitalize">${status}</td>
						<td>${del}</td>
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

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let project = $(this).closest('tr').data('project')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus project <b>' + project + '</b>?')
})

// $(document).on('click','.mdi-trash-all',function(){
// 	let id = ''
// 	totalDelete = []
// 	$('.mdi-check.mdi-checkbox-marked').each(function(index, value){
// 		id = atob($(value).closest('tr').data('id')).split(',')
// 		totalDelete.push(id[1])
// 	})
// 	$('.modal-body').html('Anda yakin ingin menghapus '+href+' yang dipilih?')
// })

$('#delete').click(function() {
    del(totalDelete)
    $('#dataTable').html('')
    $('#data').addClass('hide')
    $('#loading').removeClass('hide')
    $('#modal-delete').modal('hide')
})

function del(idDelete) {
    let length = totalDelete.length
    $.each(idDelete, function(index, value) {
        $.ajax({
            url: api_url + 'project/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                apiProject()
            }
        })
    })
}

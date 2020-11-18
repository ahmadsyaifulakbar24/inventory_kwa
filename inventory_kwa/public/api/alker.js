process()

function process() {
    $.ajax({
        url: api_url + 'tool_request/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let val = result.data
            $('#loading').addClass('hide')
            if (val.length > 0) {
                $('#data').removeClass('hide')
                let append, front, back
                $.each(result.data, function(index, value) {
                	console.log(value)
                	value.front_picture == null ? front = 'd-none' : front = 'd-block'
                	value.back_picture == null ? back = 'd-none' : back = 'd-block'
                    append =
                        `<tr data-id="${value.id}" data-alker="${value.item_id.nama_barang}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td><a href="${root}alker/${value.id}">${value.item_id.nama_barang}</a></td>
						<td>${value.sto_id.param}</td>
						<td class="text-truncate">${value.teknisi_id.name}</td>
						<td>${value.jenis}</td>
						<td class="text-truncate">${value.keterangan_id.param}</td>
						<td class="text-capitalize">${value.status}</td>
						<td><a href="${value.front_picture}" class="text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="text-truncate ${back}" target="_blank">Belakang</a></td>
						<td><i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i></td>
					</tr>`
                    $('#dataTable').append(append)
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                process()
            }, 1000)
        }
    })
}

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let alker = $(this).closest('tr').data('alker')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus <b>' + alker + '</b>?')
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
            url: api_url + 'tool_request/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                process()
            }
        })
    })
}

process()

function process() {
    $.ajax({
        url: api_url + 'alker/get',
        data: {
            main_alker_id: id
        },
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, status
                $.each(result.data, function(index, value) {
                    if (index == 0) {
                        $('#nama_barang').html(value.main_alker.nama_barang)
                        $('title').prepend(value.main_alker.nama_barang)
                    }
                    value.status == 'in' || value.status == 'pending' ? status = 'Di Gudang' : status = 'Sudah Keluar'
                    append =
                        `<tr data-id="${value.id}" data-barang="${value.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}tool/detail/${btoa(value.kode_alker)}">${value.kode_alker}</a></td>
						<td class="text-truncate text-capitalize">${status}</td>
						<td class="text-truncate"><a id="download_qrcode${value.id}"><i class="mdi mdi-download"></i>Download</a></td>
						<!--<td><i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i></td>-->
					</tr>`
                    $('#dataTable').append(append)

                    $('#qrcode').append(`<div id="qrcode${value.id}"></div>`)
                    createCode(value.id, value.kode_alker)
                    setTimeout(function() {
                        let src = $('#qrcode' + value.id).find('img').attr('src')
                        $('#download_qrcode' + value.id).attr('href', src)
                        $('#download_qrcode' + value.id).attr('download', value.kode_alker)
                    }, 0)
                })
            } else {
                $('#empty').removeClass('hide')
            	$('title').prepend('Detail Alker')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                process()
            }, 1000)
        }
    })
}

// let totalDelete = []
// $(document).on('click', '.mdi-trash', function() {
//     let id = $(this).closest('tr').data('id')
//     let barang = $(this).closest('tr').data('barang')
//     totalDelete = []
//     totalDelete.push(id)
//     $('#btn-delete').data('id', id)
//     $('.modal-body').html('Anda yakin ingin menghapus <b>' + barang + '</b>?')
// })

// $(document).on('click','.mdi-trash-all',function(){
// 	let id = ''
// 	totalDelete = []
// 	$('.mdi-check.mdi-checkbox-marked').each(function(index, value){
// 		id = atob($(value).closest('tr').data('id')).split(',')
// 		totalDelete.push(id[1])
// 	})
// 	$('.modal-body').html('Anda yakin ingin menghapus '+href+' yang dipilih?')
// })

// $('#delete').click(function() {
//     del(totalDelete)
//     $('#dataTable').html('')
//     $('#data').addClass('hide')
//     $('#loading').removeClass('hide')
//     $('#modal-delete').modal('hide')
// })

// function del(idDelete) {
//     let length = totalDelete.length
//     $.each(idDelete, function(index, value) {
//         $.ajax({
//             url: api_url + 'item/delete/' + value,
//             type: 'DELETE',
//             beforeSend: function(xhr) {
//                 xhr.setRequestHeader("Authorization", "Bearer " + token)
//             },
//             success: function(result) {
//                 process()
//             }
//         })
//     })
// }

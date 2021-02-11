get_main_alker()

function get_main_alker() {
	$.ajax({
	    url: api_url + 'alker/get_main_alker',
	    type: 'GET',
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("Authorization", "Bearer " + token)
	    },
	    success: function(result) {
	        // console.log(result.data)
	        $('#loading').addClass('hide')
	        if (result.data.length > 0) {
	            $('#data').removeClass('hide')
	            let append
	            $.each(result.data, function(index, value) {
	                append =
	                `<tr data-id="${value.id}" data-barang="${value.nama_barang}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}tool/${value.id}">${value.kode_main_alker}</a></td>
						<td class="text-truncate">${value.nama_barang}</td>
						<td>${value.satuan}</td>
						<td><i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i></td>
					</tr>`
	                $('#table').append(append)
	            })
	        } else {
	            $('#empty').removeClass('hide')
	        }
	    },
	    error: function(xhr, status) {
            setTimeout(function() {
                get_main_alker()
            }, 1000)
	    }
	})
}

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let barang = $(this).closest('tr').data('barang')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus <b>' + barang + '</b>?')
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
    $('#data').addClass('hide')
    $('#loading').removeClass('hide')
    $('#modal-delete').modal('hide')
    $('#table').html('')
})

function del(idDelete) {
    let length = totalDelete.length
    $.each(idDelete, function(index, value) {
        $.ajax({
            url: api_url + 'main_alker/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                get_main_alker()
            }
        })
    })
}

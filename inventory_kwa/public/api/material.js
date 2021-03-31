get_material()

function get_material() {
	$.ajax({
	    url: api_url + 'item/get',
	    type: 'GET',
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("Authorization", "Bearer " + token)
	    },
	    success: function(result) {
	        let val = result.data
	        $('#loading').addClass('hide')
	        if (val.length > 0) {
	            $('#data').removeClass('hide')
	            let append, danger
	            let from = 1
	            $.each(result.data, function(index, value) {
	            	// console.log(value)
	            	value.stock < 5 ? danger = 'text-danger' : danger = ''
	                append =
	                `<tr data-id="${value.id}" data-material="${value.nama_barang}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate"><a href="${root}material/${value.id}">${value.kode}</a></td>
						<td class="text-truncate">${value.nama_barang}</td>
						<td>${value.keterangan}</td>
						<td class="text-truncate ${danger}">${value.stock} ${value.satuan}</td>
						<td>${value.jenis}</td>
						<td>
							<i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i>
						</td>
					</tr>`
	                $('#' + value.jenis).append(append)
	                from++
	            })
	        } else {
	            $('#empty').removeClass('hide')
	        }
	    },
	    error: function(xhr, status) {
            setTimeout(function() {
                get_material()
            }, 1000)
	    }
	})
}

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let material = $(this).closest('tr').data('material')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus <b>' + material + '</b>?')
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
            url: api_url + 'item/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                get_material()
            }
        })
    })
}

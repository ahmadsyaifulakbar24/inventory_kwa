get_supplier()

function get_supplier() {
    $.ajax({
        url: api_url + 'supplier/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, contact
                $.each(result.data, function(index, value) {
                	value.contact != null ? contact = value.contact : contact = ''
                    append += `<tr data-id="${value.id}" data-supplier="${value.name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}supplier/${value.id}">${value.name}</a></td>
						<td class="text-truncate text-capitalize">${value.type}</td>
						<td class="text-truncate">${contact}</td>
						<td><i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i></td>
					</tr>`
                })
                $('#table').html(append)
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_supplier()
            }, 1000)
        }
    })
}

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let supplier = $(this).closest('tr').data('supplier')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus supplier <b>' + supplier + '</b>?')
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
})

function del(idDelete) {
    let length = totalDelete.length
    $.each(idDelete, function(index, value) {
        $.ajax({
            url: api_url + 'supplier/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                // get_supplier()
            }
        })
    })
    setTimeout(function() {
	    get_supplier()
    }, 1000)
}

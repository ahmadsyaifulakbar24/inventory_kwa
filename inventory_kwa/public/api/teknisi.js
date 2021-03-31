get_employee()

function get_employee() {
    $.ajax({
        url: api_url + 'employee/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, email, telepon, status, alamat
                let from = 1
                $.each(result.data, function(index, value) {
                	value.email == null || value.email == '' ? email = '-' : email = value.email
                	value.no_hp == null || value.no_hp == '' ? telepon = '-' : telepon = value.no_hp
                	value.status == null || value.status == '' ? status = '-' : status = value.status
                	value.alamat == null || value.alamat == '' ? alamat = '-' : alamat = value.alamat
                    append =
                        `<tr data-id="${value.id}" data-teknisi="${value.name}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate"><a href="${root}teknisi/${value.id}">${value.name}</a></td>
						<td class="text-truncate">${value.nik}</td>
						<td class="text-truncate">${email}</td>
						<td class="text-truncate">${telepon}</td>
						<td class="text-truncate">${status}</td>
						<td class="text-truncatee">${alamat}</td>
						<td>
							<i class="mdi mdi-trash mdi-trash-can-outline mdi-18px pr-0" role="button" data-toggle="modal" data-target="#modal-delete"></i>
						</td>
					</tr>`
                    $('#data_get_employee').append(append)
                    from++
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_employee(page)
            }, 1000)
        }
    })
}

let totalDelete = []
$(document).on('click', '.mdi-trash', function() {
    let id = $(this).closest('tr').data('id')
    let teknisi = $(this).closest('tr').data('teknisi')
    totalDelete = []
    totalDelete.push(id)
    $('#btn-delete').data('id', id)
    $('.modal-body').html('Anda yakin ingin menghapus teknisi <b>' + teknisi + '</b>?')
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
    $('#data_get_employee').html('')
})

function del(idDelete) {
    let length = totalDelete.length
    $.each(idDelete, function(index, value) {
        $.ajax({
            url: api_url + 'employee/delete/' + value,
            type: 'DELETE',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                get_employee()
            }
        })
    })
}

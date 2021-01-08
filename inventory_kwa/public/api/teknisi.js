get_employee()

function get_employee() {
    $.ajax({
        url: api_url + 'employee/get',
        type: 'GET',
        // data: {
        // 	page: page
        // },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
			// $('#pagination').show()
			// $('#loading_data_get_employee').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, email, telepon, status, alamat
                $.each(result.data, function(index, value) {
                	value.email == null || value.email == '' ? email = '-' : email = value.email
                	value.no_hp == null || value.no_hp == '' ? telepon = '-' : telepon = value.no_hp
                	value.status == null || value.status == '' ? status = '-' : status = value.status
                	value.alamat == null || value.alamat == '' ? alamat = '-' : alamat = value.alamat
                    append =
                        `<tr data-id="${value.id}" data-teknisi="${value.name}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
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
                })

                // let links = result.links
				// let meta = result.meta
				// let current = meta.current_page

				// let first = links.first.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				// if(first != current){
				// 	$('#first').removeClass('disabled')
				// 	$('#first').data('id',first)
				// } else {
				// 	$('#first').addClass('disabled')
				// }

				// if(links.prev != null){
				// 	$('#prev').removeClass('disabled')
				// 	let prev = links.prev.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				// 	$('#prev').data('id',prev)

				// 	$('#prevCurrent').show()
				// 	$('#prevCurrent span').html(prev)
				// 	$('#prevCurrent').data('id',prev)
					
				// 	let prevCurrentDouble = prev - 1
				// 	if(prevCurrentDouble > 0) {
				// 		$('#prevCurrentDouble').show()
				// 		$('#prevCurrentDouble span').html(prevCurrentDouble)
				// 		$('#prevCurrentDouble').data('id',prevCurrentDouble)
				// 	} else {
				// 		$('#prevCurrentDouble').hide()
				// 	}
				// } else {
				// 	$('#prev').addClass('disabled')
				// 	$('#prevCurrent').hide()
				// 	$('#prevCurrentDouble').hide()
				// }

				// $('#current').addClass('active')
				// $('#current span').html(current)

				// if(links.next != null){
				// 	$('#next').removeClass('disabled')
				// 	let next = links.next.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				// 	$('#next').data('id',next)

				// 	$('#nextCurrent').show()
				// 	$('#nextCurrent span').html(next)
				// 	$('#nextCurrent').data('id',next)
								
				// 	let nextCurrentDouble = ++next
				// 	if(nextCurrentDouble <= meta.last_page) {
				// 		$('#nextCurrentDouble').show()
				// 		$('#nextCurrentDouble span').html(nextCurrentDouble)
				// 		$('#nextCurrentDouble').data('id',nextCurrentDouble)
				// 	} else {
				// 		$('#nextCurrentDouble').hide()
				// 	}
				// } else {
				// 	$('#next').addClass('disabled')
				// 	$('#nextCurrent').hide()
				// 	$('#nextCurrentDouble').hide()
				// }

				// let last = links.last.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				// if(last != current){
				// 	$('#last').removeClass('disabled')
				// 	$('#last').data('id',last)
				// } else {
				// 	$('#last').addClass('disabled')
				// }
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

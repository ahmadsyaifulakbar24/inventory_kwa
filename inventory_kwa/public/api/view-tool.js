get_alker(1)
get_main_alker_by_id(id)

function get_main_alker_by_id(id) {
	$.ajax({
        url: api_url + 'main_alker/get/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
	        $('#nama_barang').html(result.data.nama_barang)
	        $('#edit').removeClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_main_alker_by_id(id)
            }, 1000)
        }
    })
}

function get_alker(page) {
    $.ajax({
        url: api_url + 'alker/get',
        data: {
            main_alker_id: id,
            page: page
        },
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	// console.log(result)
            $('#qrcode').html('')
            $('#loading').addClass('hide')
            $('#edit').attr('href', root + 'main-alker/' + id)
            $('.compose a').attr('href', root + 'create/tool/' + id)
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, status, keterangan
                let from = result.meta.from
                $.each(result.data, function(index, value) {
                    if (index == 0) {
                        $('#nama_barang').html(value.main_alker.nama_barang)
                        $('title').prepend(value.main_alker.nama_barang)
                    }
                    if (value.status == 'in' || value.status == 'pending') {
                        status = '<span class="text-warning">Di Gudang</span>'
                    } else {
                        status = '<span class="text-success">Sudah Keluar</span>'
                    }
                    if (value.keterangan == null || value.keterangan == '-' || value.keterangan == '') {
                    	keterangan = ''
                    } else {
                    	keterangan = value.keterangan
                    }
                    append = `<tr data-id="${value.id}" data-barang="${value.kode_alker}">
						<td class="text-center">${from}.</td>
						<td class="text-truncate"><a href="${root}tool/detail/${btoa(value.kode_alker)}">${value.kode_alker}</a></td>
						<td>${keterangan}</td>
						<td class="text-truncate text-capitalize ${value.status}">${status}</td>
						<td class="text-truncate"><div class="btn btn-sm btn-outline-primary" id="linkQR${value.id}"><i class="mdi mdi-download"></i>Download</div></td>
					</tr>`
                    $('#data_get_alker').append(append)
                    from++

                    $('#qrcode').append(`<div id="qrcode${value.id}"></div>`)
                    createQR(value.id, value.kode_alker)
                    setTimeout(function() {
                        let src = $('#qrcode' + value.id).find('img').attr('src')
                        $('#qrcode' + value.id).append(`<b>${value.kode_alker}</b>`)
                        $('#qrcode' + value.id).attr('data-filename', value.kode_alker)
                        $('#qrcode' + value.id).addClass('d-inline-block text-center small')
                        $('#linkQR' + value.id).attr('onClick', 'downloadQR(' + value.id + ')')
                    }, 0)
                })
                pagination(result.links, result.meta, result.meta.path)
                $('#stok').html(result.meta.total)
				$('#pagination').show()
				$('#loading_data').hide()
            } else {
                $('#empty').removeClass('hide')
                $('title').prepend('Detail Alker')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker(page)
            }, 1000)
        }
    })
}

get_alker_status()

function get_alker_status() {
	$.ajax({
        url: api_url + 'main_alker/get/' + id,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	// console.log(result.data)
        	$('#keluar').html(result.data.total_alker_keluar)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_status()
            }, 1000)
        }
    })
}

$('.page').click(function() {
	if(!$(this).is('.active, .disabled')){
		let page = $(this).data('id')
		$('#pagination').hide()
		$('#loading_data').show()
		$('#filter').val('all')
		$('#data_get_alker').html('')
		get_alker(page)
	}
})

$('#filter').change(function() {
    let value = $(this).val()
    if (value == 'all') {
        $('.out').parent('tr').show()
        $('.in').parent('tr').show()
        $('.pending').parent('tr').show()
    } else if (value == 'out') {
        $('.out').parent('tr').show()
        $('.in').parent('tr').hide()
        $('.pending').parent('tr').hide()
    } else {
        $('.out').parent('tr').hide()
        $('.in').parent('tr').show()
        $('.pending').parent('tr').show()
    }
})

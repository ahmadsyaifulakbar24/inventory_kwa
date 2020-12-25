get_alker(1)

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
            $('.compose a').attr('href', root + 'create/tool/' + id)
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, status, keluar = 0
                $.each(result.data, function(index, value) {
                    if (index == 0) {
                        $('#nama_barang').html(value.main_alker.nama_barang)
                        $('title').prepend(value.main_alker.nama_barang)
                    }
                    if (value.status == 'in' || value.status == 'pending') {
                        status = 'Di Gudang'
                    } else {
                        status = 'Sudah Keluar'
                        keluar++
                    }
                    append =
                        `<tr data-id="${value.id}" data-barang="${value.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}tool/detail/${btoa(value.kode_alker)}">${value.kode_alker}</a></td>
						<td>${value.keterangan}</td>
						<td class="text-truncate text-capitalize ${value.status}">${status}</td>
						<td class="text-truncate"><div class="btn btn-sm btn-outline-primary" id="linkQR${value.id}"><i class="mdi mdi-download"></i>Download</div></td>
					</tr>`
                    $('#data_get_alker').append(append)

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

                let links = result.links
				let meta = result.meta
				let current = meta.current_page

				let first = links.first.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get?page=','')
				if(first != current){
					$('#first').removeClass('disabled')
					$('#first').data('id',first)
				} else {
					$('#first').addClass('disabled')
				}

				if(links.prev != null){
					$('#prev').removeClass('disabled')
					let prev = links.prev.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get?page=','')
					$('#prev').data('id',prev)

					$('#prevCurrent').show()
					$('#prevCurrent span').html(prev)
					$('#prevCurrent').data('id',prev)
					
					let prevCurrentDouble = prev - 1
					if(prevCurrentDouble > 0) {
						$('#prevCurrentDouble').show()
						$('#prevCurrentDouble span').html(prevCurrentDouble)
						$('#prevCurrentDouble').data('id',prevCurrentDouble)
					} else {
						$('#prevCurrentDouble').hide()
					}
				} else {
					$('#prev').addClass('disabled')
					$('#prevCurrent').hide()
					$('#prevCurrentDouble').hide()
				}

				$('#current').addClass('active')
				$('#current span').html(current)

				if(links.next != null){
					$('#next').removeClass('disabled')
					let next = links.next.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get?page=','')
					$('#next').data('id',next)

					$('#nextCurrent').show()
					$('#nextCurrent span').html(next)
					$('#nextCurrent').data('id',next)
								
					let nextCurrentDouble = ++next
					if(nextCurrentDouble <= meta.last_page) {
						$('#nextCurrentDouble').show()
						$('#nextCurrentDouble span').html(nextCurrentDouble)
						$('#nextCurrentDouble').data('id',nextCurrentDouble)
					} else {
						$('#nextCurrentDouble').hide()
					}
				} else {
					$('#next').addClass('disabled')
					$('#nextCurrent').hide()
					$('#nextCurrentDouble').hide()
				}

				let last = links.last.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get?page=','')
				if(last != current){
					$('#last').removeClass('disabled')
					$('#last').data('id',last)
				} else {
					$('#last').addClass('disabled')
				}

                $('#stok').html(result.meta.total)
                $('#keluar').html(keluar)
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

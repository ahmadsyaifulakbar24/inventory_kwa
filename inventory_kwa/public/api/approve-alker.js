get_alker_request(1)

function get_alker_request(page) {
    $.ajax({
        url: api_url + 'alker/get_alker_request',
        type: 'GET',
        data: {
        	page: page
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result.data)
            $('#loading').addClass('hide')
			$('#pagination').show()
			$('#loading_data_get_alker_request').hide()
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, status, success, front, back, sto, teknisi, kegunaan
                $.each(result.data, function(index, value) {
                	value.sto.sto != null ? sto = value.sto.sto : sto = ''
                	value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
                	value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
                	value.front_picture == '' ? front = 'd-none' : front = 'd-block'
                	value.back_picture == '' ? back = 'd-none' : back = 'd-block'
                    if (value.status == 'accepted') {
                    	success = 'text-success'
                    	status = 'Disetujui'
                    } else {
                    	success = 'text-warning'
                    	status = value.status
                    }
                    append =
                        `<tr data-id="${value.id}" data-alker="${value.alker.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}approve-alker/${value.id}">${value.alker.kode_alker}</a></td>
						<td class="text-truncate">${value.alker.main_alker.nama_barang}</td>
						<td>${sto}</td>
						<td class="text-truncate">${teknisi}</td>
						<td>${kegunaan}</td>
						<td class="text-truncate">${value.keterangan.keterangan}</td>
						<td class="text-capitalize ${success}">${status}</td>
						<td><a href="${value.front_picture}" class="btn btn-sm btn-outline-primary text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="btn btn-sm btn-outline-primary text-truncate ${back}" target="_blank">Belakang</a></td>
					</tr>`
                    $('#data_get_alker_request').append(append)
                })

                let links = result.links
				let meta = result.meta
				let current = meta.current_page

				let first = links.first.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				if(first != current){
					$('#first').removeClass('disabled')
					$('#first').data('id',first)
				} else {
					$('#first').addClass('disabled')
				}

				if(links.prev != null){
					$('#prev').removeClass('disabled')
					let prev = links.prev.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
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
					let next = links.next.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
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

				let last = links.last.replace('http://103.112.44.35/inventory_kwa/inventory_kwa_api/public/alker/get_alker_request?page=','')
				if(last != current){
					$('#last').removeClass('disabled')
					$('#last').data('id',last)
				} else {
					$('#last').addClass('disabled')
				}
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_request(page)
            }, 1000)
        }
    })
}

$('.page').click(function() {
	if(!$(this).is('.active, .disabled')){
		let page = $(this).data('id')
		$('#pagination').hide()
		$('#loading_data_get_alker_request').show()
		$('#data_get_alker_request').html('')
		get_alker_request(page)
	}
})

get_alker_request(1)
get_alker_request_group(1)

function get_alker_request_group(page) {
    $.ajax({
        url: api_url + 'alker/get_alker_request_group',
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
            $('#pagination_group').show()
            $('#loading_data_get_alker_request_group').hide()
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append
                $.each(result.data, function(index, value) {
                    append = `<tr data-id="${value.id}" data-alker="${value.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}alker/${value.alker_id}">${value.kode_alker}</a></td>
						<td class="text-truncate">${value.nama_barang}</td>
						<td class="text-truncate">${value.total}</td>
					</tr>`
                    $('#data_get_alker_request_group').append(append)
                })

                let links = result.links
                let meta = result.meta
                let current = meta.current_page
                let path = meta.path + '?page='

                let first = links.first.replace(path, '')
                if (first != current) {
                    $('#groupFirst').removeClass('disabled')
                    $('#groupFirst').data('id', first)
                } else {
                    $('#groupFirst').addClass('disabled')
                }

                if (links.prev != null) {
                    $('#groupPrev').removeClass('disabled')
                    let prev = links.prev.replace(path, '')
                    $('#groupPrev').data('id', prev)

                    $('#groupPrevCurrent').show()
                    $('#groupPrevCurrent span').html(prev)
                    $('#groupPrevCurrent').data('id', prev)

                    let prevCurrentDouble = prev - 1
                    if (prevCurrentDouble > 0) {
                        $('#groupPrevCurrentDouble').show()
                        $('#groupPrevCurrentDouble span').html(prevCurrentDouble)
                        $('#groupPrevCurrentDouble').data('id', prevCurrentDouble)
                    } else {
                        $('#groupPrevCurrentDouble').hide()
                    }
                } else {
                    $('#groupPrev').addClass('disabled')
                    $('#groupPrevCurrent').hide()
                    $('#groupPrevCurrentDouble').hide()
                }

                $('#groupCurrent').addClass('active')
                $('#groupCurrent span').html(current)

                if (links.next != null) {
                    $('#groupNext').removeClass('disabled')
                    let next = links.next.replace(path, '')
                    $('#groupNext').data('id', next)

                    $('#groupNextCurrent').show()
                    $('#groupNextCurrent span').html(next)
                    $('#groupNextCurrent').data('id', next)

                    let nextCurrentDouble = ++next
                    if (nextCurrentDouble <= meta.last_page) {
                        $('#groupNextCurrentDouble').show()
                        $('#groupNextCurrentDouble span').html(nextCurrentDouble)
                        $('#groupNextCurrentDouble').data('id', nextCurrentDouble)
                    } else {
                        $('#groupNextCurrentDouble').hide()
                    }
                } else {
                    $('#groupNext').addClass('disabled')
                    $('#groupNextCurrent').hide()
                    $('#groupNextCurrentDouble').hide()
                }

                let last = links.last.replace(path, '')
                if (last != current) {
                    $('#groupLast').removeClass('disabled')
                    $('#groupLast').data('id', last)
                } else {
                    $('#groupLast').addClass('disabled')
                }
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_request_group(page)
            }, 1000)
        }
    })
}

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
            // console.log(result)
            $('#pagination').show()
            $('#loading_data_get_alker_request').hide()
            if (result.data.length > 0) {
                let append, color, front, back, sto, teknisi, kegunaan
                $.each(result.data, function(index, value) {
                    value.front_picture == '' || value.front_picture == null ? front = 'd-none' : front = 'd-block'
                    value.back_picture == '' || value.back_picture == null ? back = 'd-none' : back = 'd-block'
                    value.sto.sto != null ? sto = value.sto.sto : sto = ''
                    value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
                    value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
                    if (value.status == 'accepted') {
                        color = 'text-success'
                    } else if (value.status == 'pending') {
                        color = 'text-warning'
                    } else {
                        color = 'text-danger'
                    }
                    append = `<tr data-id="${value.id}" data-alker="${value.alker.kode_alker}">
						<td><i class="mdi mdi-check mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></td>
						<td class="text-truncate"><a href="${root}alker/detail/${btoa(value.alker.kode_alker)}">${value.alker.kode_alker}</a></td>
						<td class="text-truncate">${value.alker.main_alker.nama_barang}</td>
						<td>${sto}</td>
						<td class="text-truncate">${teknisi}</td>
						<td>${kegunaan}</td>
						<td class="text-truncate">${value.keterangan.keterangan}</td>
						<td class="text-capitalize ${color}">${value.status}</td>
						<td><a href="${value.front_picture}" class="btn btn-sm btn-outline-primary text-truncate ${front}" target="_blank">Depan</a></td>
						<td><a href="${value.back_picture}" class="btn btn-sm btn-outline-primary text-truncate ${back}" target="_blank">Belakang</a></td>
					</tr>`
                    $('#data_get_alker_request').append(append)
                })
                pagination(result.links, result.meta, result.meta.path)
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

$(document).on('click', '.page', function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        let filter = $(this).parent('.pagination').data('filter')
        if (filter == 'group') {
            $('#pagination_group').hide()
            $('#loading_data_get_alker_request_group').show()
            $('#data_get_alker_request_group').html('')
            get_alker_request_group(page)
        } else {
            $('#pagination').hide()
            $('#loading_data_get_alker_request').show()
            $('#data_get_alker_request').html('')
            get_alker_request(page)
        }
    }
})

$('#filter').change(function() {
    let value = $(this).val()
    if (value == 'all') {
        $('#get_alker_request').show()
        $('#get_alker_request_group').hide()
    } else {
        $('#get_alker_request').hide()
        $('#get_alker_request_group').show()
    }
})

$(document).ready(function() {
    $('#filter').val('in')
})

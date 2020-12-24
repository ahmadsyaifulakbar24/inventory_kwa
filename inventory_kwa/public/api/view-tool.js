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
            // console.log(result.data)
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, status, stok = 0,
                    keluar = 0
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
                    $('#dataTable').append(append)

                    $('#qrcode').append(`<div id="qrcode${value.id}"></div>`)
                    createQR(value.id, value.kode_alker)
                    setTimeout(function() {
                        let src = $('#qrcode' + value.id).find('img').attr('src')
                        $('#qrcode' + value.id).append(`<b>${value.kode_alker}</b>`)
                        $('#qrcode' + value.id).attr('data-filename', value.kode_alker)
                        $('#qrcode' + value.id).addClass('d-inline-block text-center small')
                        $('#linkQR' + value.id).attr('onClick', 'downloadQR(' + value.id + ')')
                    }, 0)
                    stok++
                })
                $('#stok').html(stok)
                $('#keluar').html(keluar)
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

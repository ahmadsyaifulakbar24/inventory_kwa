get_satuan()

function get_satuan() {
    $.ajax({
        url: api_url + 'param/get_satuan',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
        	let append
        	$.each(result.data, function(index, value) {
        		append += `<option value="${value.param}">${value.param}</option>`
        	})
        	$('#satuan').append(append)
			get_material()
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_satuan()
            }, 1000)
        }
    })
}


function get_material() {
    $.ajax({
        url: api_url + 'item/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	let value = result.data
        	$('#kode').val(value.kode)
			$('#nama_barang').val(value.nama_barang)
			$('#keterangan').val(value.keterangan)
			$('#satuan').val(value.satuan)
			$('#jenis').val(value.jenis)
			$('#stok').val(value.stock)

            $('#data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_material()
            }, 1000)
        }
    })
}

$('#form').submit(function(e) {
    e.preventDefault()
    buttonLoading()
    $('.is-invalid').removeClass('is-invalid')

    let kode = $('#kode').val()
    let nama_barang = $('#nama_barang').val()
    let keterangan = $('#keterangan').val()
    let satuan = $('#satuan').val()
    let jenis = $('#jenis').val()
    let stok = $('#stok').val()

    $.ajax({
        url: api_url + 'item/update/' + id,
        type: 'PATCH',
        data: {
            type_item: 'goods',
            kode: kode,
            nama_barang: nama_barang,
            keterangan: keterangan,
            satuan: satuan,
            jenis: jenis,
            stock: stok
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'material'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.log(err)
            if (err.kode) {
                if (err.kode == "The kode field is required.") {
                    $('#kode').addClass('is-invalid')
                    $('#kode-feedback').html('Masukkan kode.')
                } else if (err.kode == "The kode has already been taken.") {
                    $('#kode').addClass('is-invalid')
                    $('#kode-feedback').html('Kode telah digunakan.')
                }
            }
            if (err.nama_barang) {
                $('#nama_barang').addClass('is-invalid')
                $('#nama_barang-feedback').html('Masukkan nama material.')
            }
            if (err.keterangan) {
                $('#keterangan').addClass('is-invalid')
                $('#keterangan-feedback').html('Masukkan keterangan.')
            }
            if (err.satuan) {
                $('#satuan').addClass('is-invalid')
                $('#satuan-feedback').html('Pilih satuan.')
            }
            if (err.jenis) {
                $('#jenis').addClass('is-invalid')
                $('#jenis-feedback').html('Pilih jenis.')
            }
            if (err.stock) {
                $('#stok').addClass('is-invalid')
                $('#stok-feedback').html('Masukkan jumlah stok.')
            }
        }
    })
})

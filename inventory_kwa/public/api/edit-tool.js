process()

function process() {
    $.ajax({
        url: api_url + 'item/get_tool/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	let value = result.data
        	$('#kode').val(value.kode)
			$('#nama_barang').val(value.nama_barang)
			$('#satuan').val(value.satuan)

            $('#form').show()
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                process()
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
    let satuan = $('#satuan').val()

    $.ajax({
        url: api_url + 'item/update/' + id,
        type: 'PATCH',
        data: {
            kode: kode,
            nama_barang: nama_barang,
            satuan: satuan
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'tool'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            console.log(err)
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
                $('#nama_barang-feedback').html('Masukkan nama barang.')
            }
            if (err.satuan) {
                $('#satuan').addClass('is-invalid')
                $('#satuan-feedback').html('Pilih satuan.')
            }
        }
    })
})

process()

function process() {
    $.ajax({
        url: api_url + 'alker/get_by_code',
        type: 'GET',
        data: {
        	kode_alker: atob(id)
        },
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	let value = result.data
        	console.log(value)
            $('#kode_main_alker').html(value.main_alker.kode_main_alker)
            $('#nama_barang').html(value.main_alker.nama_barang)
            $('#satuan').html(value.main_alker.satuan)

            $('#kode_alker').html(value.kode_alker)
            $('#sto').html(value.sto.sto)
            $('#teknisi').html(value.teknisi.name)
            $('#kegunaan').html(value.kegunaan)

            let status
            value.status == 'in' ? status = 'Di Gudang' : status = 'Sudah Keluar'
            $('#status').html(status)
            $('#qrcode').append(`<div id="qrcode${value.id}"></div>`)
            createCode(value.id, value.kode_alker)

            $('#data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                process()
            }, 1000)
        }
    })
}
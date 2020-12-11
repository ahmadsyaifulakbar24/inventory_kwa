process()

function process() {
    $.ajax({
        url: api_url + 'alker/get_alker_request/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	let value = result.data
        	// console.log(value)
            $('#kode_main_alker').html(value.alker.main_alker.kode_main_alker)
            $('#nama_barang').html(value.alker.main_alker.nama_barang)
            $('#satuan').html(value.alker.main_alker.satuan)

            $('#kode_alker').html(value.alker.kode_alker)
            $('#sto').html(value.sto.sto)
            $('#teknisi').html(value.teknisi.name)
            $('#kegunaan').html(value.kegunaan)
            $('#keterangan').html(value.keterangan.keterangan)
            $('#status').html(value.status)

            value.front_picture == '' || value.front_picture == null ? $('#front').hide() : ''
            value.back_picture == '' || value.back_picture == null ? $('#back').hide() : ''
            $('#front_picture').attr('href', value.front_picture)
            $('#back_picture').attr('href', value.back_picture)
            
            $('#qrcode').append(`<div id="qrcode${value.id}"></div>`)
            createCode(value.id, value.alker.kode_alker)

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
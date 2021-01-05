get_by_code()

function get_by_code() {
    $.ajax({
        url: api_url + 'alker/get_by_code',
        type: 'GET',
        data: {
        	kode_alker: atob(kode_alker)
        },
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	get_alker_request(result.data.id)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_by_code()
            }, 1000)
        }
    })
}

function get_alker_request(id) {
    $.ajax({
        url: api_url + 'alker/get_alker_request/' + id,
        type: 'GET',
        data: {
        	kode_alker: atob(kode_alker)
        },
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

            let sto, teknisi, kegunaan
            value.sto.sto != null ? sto = value.sto.sto : sto = ''
            value.teknisi != null ? teknisi = value.teknisi.name : teknisi = ''
            value.kegunaan != null ? kegunaan = value.kegunaan.toUpperCase() : kegunaan = ''
            $('#sto').html(sto)
            $('#teknisi').html(teknisi)
            $('#kegunaan').html(kegunaan)

            $('#keterangan').html(value.keterangan.keterangan)

            let status
            if (value.status == 'in' || value.status == 'pending') {
            	status = 'Pending'
            	$('#status').addClass('text-warning')
            } else {
            	status = 'Disetujui'
            	$('#status').addClass('text-success')
            }
            $('#status').html(status)

            value.front_picture == '' || value.front_picture == null ? $('#front').hide() : ''
            value.back_picture == '' || value.back_picture == null ? $('#back').hide() : ''
            $('#front_picture').attr('href', value.front_picture)
            $('#back_picture').attr('href', value.back_picture)

            $('#qrcode').append(`<div id="qrcode${value.id}" class="d-inline-block text-center small"></div>`)
            createQR(value.id, value.alker.kode_alker)
            $('#qrcode' + value.id).append(`<b>${value.alker.kode_alker}</b>`)

            $('#data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_alker_request(id)
            }, 1000)
        }
    })
}

process()

function process() {
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
        	let value = result.data
        	// console.log(value)

        	$('#kode_alker').data('id', value.id)
            $('#kode_main_alker').html(value.main_alker.kode_main_alker)
            $('#nama_barang').html(value.main_alker.nama_barang)
            $('#satuan').html(value.main_alker.satuan)

            $('#kode_alker').html(value.kode_alker)
            $('#sto').html(value.sto.sto)
            $('#teknisi').html(value.teknisi.name)
            $('#kegunaan').html(value.kegunaan)

            let status
            value.status == 'in' || value.status == 'pending' ? status = 'Di Gudang' : status = 'Sudah Keluar'
            $('#status').html(status)

            $('.keterangan').html(value.keterangan)
            $('#edit').attr('href', root + 'tool/edit/' + value.id)

            value.front_picture == '' || value.front_picture == null ? $('#front').hide() : ''
            value.back_picture == '' || value.back_picture == null ? $('#back').hide() : ''
            $('#front_picture').attr('href', value.front_picture)
            $('#back_picture').attr('href', value.back_picture)

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

$('#modal-keterangan').on('shown.bs.modal', function(e) {
    $('#keterangan').focus()
})

$('#edit').submit(function(e) {
	e.preventDefault()
	$('#btn-edit').attr('disabled', true)
	let id = $('#kode_alker').data('id')
	let keterangan = $('#keterangan').val()
	$.ajax({
        url: api_url + 'alker/update/' + id,
        type: 'PATCH',
        data: {
        	keterangan: keterangan
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	$('.keterangan').html(result.data.keterangan)
			$('#btn-edit').attr('disabled', false)
			$('#modal-keterangan').modal('hide')
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.log(err)
        }
    })
})

let append, unit, col, del

process()

function process() {
    $.ajax({
        url: api_url + 'tool_request/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
        	let value = result.data
            value.keterangan_id.id == 28 ? $('#submit').hide() : ''
            value.status == 'accepted' ? $('#submit').hide() : ''

            $('#item_id').val(value.item_id.nama_barang)
            $('#sto_id').val(value.sto_id.param)
            $('#teknisi_id').val(value.teknisi_id.name)
            $('#jenis').val(value.jenis)
            $('#keterangan_id').val(value.keterangan_id.param)

            $('#form').removeClass('hide')
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
    $('.is-invalid').removeClass('is-invalid')

    fd.delete('front_picture')
    fd.delete('back_picture')
    fd.append('front_picture', front_picture)
    fd.append('back_picture', back_picture)

 //    if(keterangan_id == 28) {
 //    	if(staging == false) {
 //    		fd.append('front_picture', front_picture)
 //    		fd.append('back_picture', back_picture)
 //    	} else {
	//     	front_status == true ? fd.append('front_picture', front_picture) : ''
	// 	    back_status == true ? fd.append('back_picture', back_picture) : ''
	// 	}
	// }
	// console.clear()
 //    console.log(...fd)

    buttonLoading()
    $.ajax({
        url: api_url + 'tool_request/accept/' + id,
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'approve-alker'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            console.clear()
            console.log(...fd)
            console.log(err)
            if (err.front_picture) {
                $('#front_picture').addClass('is-invalid')
                $('#front_picture-feedback').html('Masukkan foto depan.')
            }
            if (err.back_picture) {
                $('#back_picture').addClass('is-invalid')
                $('#back_picture-feedback').html('Masukkan foto belakang.')
            }
        }
    })
})

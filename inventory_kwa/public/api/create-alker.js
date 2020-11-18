let append, unit, col, del
let appendTool = '',
	appendSTO = '',
	appendJenis = '',
	appendKeterangan = ''

apiTool()
apiSTO()
apiJenis()
apiKeterangan()

function apiTool() {
    $.ajax({
        url: api_url + 'item/get_tool',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
            	appendTool = `<option value=${value.id}>${value.nama_barang}</option>`
            	$('#item_id').append(appendTool)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiTool()
            }, 1000)
        }
    })
}

function apiSTO() {
    $.ajax({
        url: api_url + 'param/get_sto',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
            	appendTool = `<option value=${value.id}>${value.param}</option>`
            	$('#sto_id').append(appendTool)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiSTO()
            }, 1000)
        }
    })
}

function apiJenis() {
    $.ajax({
        url: api_url + 'param/get_jenis_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
            	appendJenis = `<option value=${value.param}>${value.param}</option>`
            	$('#jenis').append(appendJenis)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiJenis()
            }, 1000)
        }
    })
}

function apiKeterangan() {
    $.ajax({
        url: api_url + 'param/get_keterangan_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
            	appendKeterangan = `<option value=${value.id}>${value.param}</option>`
            	$('#keterangan_id').append(appendKeterangan)
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiKeterangan()
            }, 1000)
        }
    })
}

$(document).ajaxStop(function() {
	$('#form').removeClass('hide')
	$('#loading').addClass('hide')
})

$('#keterangan_id').change(function() {
	let id = $(this).val()
	id == 28 ? $('.form-file').removeClass('hide') : $('.form-file').addClass('hide')
})

$('#form').submit(function(e) {
    e.preventDefault()
    let error = false
    let item_id = $('#item_id').val()
    let sto_id = $('#sto_id').val()
    let teknisi_id = $('#teknisi_id').data('id')
    let jenis = $('#jenis').val()
    let keterangan_id = $('#keterangan_id').val()
    $('.is-invalid').removeClass('is-invalid')

    fd.delete('item_id')
    fd.delete('sto_id')
    fd.delete('teknisi_id')
    fd.delete('jenis')
    fd.delete('keterangan_id')
    fd.delete('front_picture')
    fd.delete('back_picture')

    fd.append('item_id', item_id)
    fd.append('sto_id', sto_id)
    fd.append('teknisi_id', teknisi_id)
    fd.append('jenis', jenis)
    fd.append('keterangan_id', keterangan_id)
    if(keterangan_id == 28) {
	    fd.append('front_picture', front_picture)
	    fd.append('back_picture', back_picture)
	}
    // console.log(...fd)

    buttonLoading()
    $.ajax({
        url: api_url + 'tool_request/create',
        type: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'alker'
        },
        error: function(xhr) {
        	removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.clear()
            // console.log(...fd)
            // console.log(err)
            if (err.item_id) {
                $('#item_id').addClass('is-invalid')
                $('#item_id-feedback').html('Pilih nama barang.')
            }
            if (err.sto_id) {
                $('#sto_id').addClass('is-invalid')
                $('#sto_id-feedback').html('Pilih STO.')
            }
            if (err.teknisi_id) {
                $('#teknisi_id').addClass('is-invalid')
                $('#teknisi_id-feedback').html('Pilih teknisi.')
            }
            if (err.jenis) {
                $('#jenis').addClass('is-invalid')
                $('#jenis-feedback').html('Pilih jenis.')
            }
            if (err.keterangan_id) {
                $('#keterangan_id').addClass('is-invalid')
                $('#keterangan_id-feedback').html('Pilih keterangan.')
            }
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

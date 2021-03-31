get_main_alker()

function get_main_alker() {
    $.ajax({
        url: api_url + 'alker/get_main_alker',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let append = ''
            $.each(result.data, function(index, value) {
                append = `<option value="${value.id}" data-code="${value.kode_main_alker}" data-name="${value.nama_barang}" data-unit="${value.satuan}">${value.nama_barang}</option>`
                $('#main_alker_id').append(append)
            })

		    $('#main_alker_id option[value="'+id+'"]').attr('selected','selected');
		    let select = $('#main_alker_id').find('option:selected');
		    $('#code').html(select.data('code'))
		    $('#name').html(select.data('name'))
		    $('#unit').html(select.data('unit'))
		    
            $('#data').removeClass('hide')
            $('#loading').addClass('hide')
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_main_alker()
            }, 1000)
        }
    })
}

$('#form').submit(function(e) {
    e.preventDefault()
    buttonLoading()
    $('.is-invalid').removeClass('is-invalid')

    let main_alker_id = $('#main_alker_id').val()
    let keterangan = $('#keterangan').val()

    $.ajax({
        url: api_url + 'alker/create',
        type: 'POST',
        data: {
            // main_alker_id: main_alker_id,
            keterangan: keterangan
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'tool/' + main_alker_id
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.log(err)
            if (err.main_alker_id) {
                $('#main_alker_id').addClass('is-invalid')
                $('#main_alker_id-feedback').html('Pilih alker.')
            }
        }
    })
})

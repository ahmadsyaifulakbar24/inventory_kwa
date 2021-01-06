$('#form').submit(function(e) {
    e.preventDefault()
    $('.is-invalid').removeClass('is-invalid')

    let kode_main_alker = $('#kode_main_alker').val()
    let nama_barang = $('#nama_barang').val()
    let satuan = $('#satuan').val()

    buttonLoading()
    $.ajax({
        url: api_url + 'main_alker/create',
        type: 'POST',
        data: {
            kode_main_alker: kode_main_alker,
            nama_barang: nama_barang,
            satuan: satuan
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            location.href = root + 'main-alker'
        },
        error: function(xhr) {
            removeLoading()
            let err = JSON.parse(xhr.responseText)
            // console.log(err)
            if (err.kode_main_alker) {
                $('#kode_main_alker').addClass('is-invalid')
                $('#kode_main_alker-feedback').html('Masukkan kode barang.')
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

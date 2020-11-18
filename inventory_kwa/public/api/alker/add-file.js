let fd = new FormData()
let front_picture = null,
	back_picture = null,
	front_status = false,
	back_status = false

$(document).on('change', 'input[type="file"]', function() {
    let val = $(this).get(0).files[0]
    let ext = val.name.split('.').pop()
    let picture = $(this).data('picture')
    const format = ['jpg', 'jpeg', 'png']

    if (format.includes(ext) == true) {
        if (val.size <= 5000000) {
            addStagingFile(val.name, picture)
            picture == 'front' ? front_picture = val : back_picture = val
            $(this).parents('.file-' + picture).hide()
            $(this).parents('.file-group').append(append)
            $(this).removeClass('is-invalid')
            // console.clear()
            // console.log(front_picture)
            // console.log(back_picture)
        } else {
            $(this).addClass('is-invalid')
            $(this).siblings('.invalid-feedback').html('Ukuran lampiran maksimal 5MB.')
        }
    } else {
        $(this).addClass('is-invalid')
        $(this).siblings('.invalid-feedback').html('Format lampiran wajib berupa JPG/PNG.')
    }
})

$(document).on('click', '.mdi-staging', function() {
    let picture = $(this).data('picture')
    if (picture == 'front') {
    	front_picture = null
    	front_status = true
    } else {
    	back_picture = null
    	back_status = true
    }
    $('.file-' + picture).show()
    $(this).parents('.file-group').remove()
    $('#' + picture + '_picture').val('')
    // console.clear()
    // console.log(front_picture)
    // console.log(back_picture)
})

function addStagingFile(name, picture) {
    let append =
        `<div class="file-group">
		<div class="staging-file d-flex align-items-center border rounded pl-2">
			<i class="mdi mdi-18px mdi-file-image-outline"></i>
			<div class="text-truncate" title="${name}">${name}</div>
			<i class="mdi mdi-close mdi-staging ml-auto pl-2 py-2" data-picture="${picture}" role="button"></i>
		</div>
	</div>`
    $('#' + picture).append(append)
}

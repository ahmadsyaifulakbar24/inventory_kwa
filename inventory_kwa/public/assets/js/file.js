let file = null

$(document).on('change', 'input[type="file"]', function(e) {
    let val = $(this).get(0).files[0]
    let ext = val.name.split('.').pop()
    let format = ['image/jpeg', 'image/png']
	if ($(this).hasClass('pdf')) {
	    format = ['application/pdf']
	}
    if (format.includes(val.type) == true) {
        if (val.size <= 2000000) {
            file = val
        	if (val.type == 'application/pdf') {
                addStagingFile(val.name, 'pdf')
	        } else {
	            let input = e.currentTarget
	            let reader = new FileReader()
	            reader.onload = function() {
	                addStagingFile(val.name, reader.result)
	            }
	            reader.readAsDataURL(input.files[0])
	        }
            $(this).parents('.file-group').hide()
            $(this).removeClass('is-invalid')
        } else {
            $(this).addClass('is-invalid')
            $(this).siblings('.invalid-feedback').html('Ukuran file maksimal 2MB.')
        }
    } else {
        $(this).addClass('is-invalid')
        if ($(this).hasClass('pdf')) {
	        $(this).siblings('.invalid-feedback').html('Format file wajib berupa pdf.')
        } else {
	        $(this).siblings('.invalid-feedback').html('Format file wajib berupa jpg/png.')
        }
    }
})

$(document).on('click', '.mdi-staging', function() {
    file = null
    $('#file').val('')
    $('.file-group').show()
    $(this).parents('.file-group').remove()
})

function addStagingFile(name, url) {
	let icon = 'mdi-image-outline'
	let img = `<img src="${url}" class="border-right border-bottom border-left rounded-bottom w-100">`
	let rounded = 'rounded-top '
	if (url == 'pdf') {
		icon = 'mdi-file-pdf-outline'
		img = ''
		rounded += 'rounded-bottom'
	}
    let append = `<div class="file-group">
		<div class="staging-file d-flex align-items-center border ${rounded} pr-0">
			<div class="d-flex align-items-center text-truncate w-100">
				<i class="mdi mdi-18px ${icon} px-2"></i>
				<small class="text-truncate" title="${name}">${name}</small>
			</div>
			<i class="mdi mdi-close mdi-staging ml-auto pl-2 py-2" role="button"></i>
		</div>
		${img}
	</div>`
    $('#form-file').append(append)
}

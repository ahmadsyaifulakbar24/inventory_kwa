$('#form').submit(function(e) {
    e.preventDefault()
    let items = {}
    let error = false
    let project_name = $('#project_name').val()
    $('.is-invalid').removeClass('is-invalid')
    $('input[type="number"]').each(function(index, value) {
    	items[$(this).data('status')+$(this).data('id')] = {
    		item_id: $('select[name="item_id[' + $(this).data('id') + ']"]').val(),
    		quantity: $(this).val()
    	}
    })

    if (project_name == '') {
        $('#project_name').addClass('is-invalid')
        error = true
    }
    // $.each(items, function(index, value) {
    //     if (value.item_id == null) {
    //         $('select[name="item_id[' + value.item_id + ']"]').addClass('is-invalid')
    //         error = true
    //     }
    //     if (value.quantity == '') {
    //         $('input[name="quantity[' + value.item_id + ']"]').addClass('is-invalid')
    //         error = true
    //     }
    // })
    // console.clear()
    // console.log(project_name)
    console.log(items)

    if (error == false) {
        buttonLoading()
        $.ajax({
            url: api_url + 'project/update/' + id,
            type: 'PATCH',
            data: {
                project_name: project_name,
                items: items
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token)
            },
            success: function(result) {
                location.href = root + 'project'
            },
            error: function(xhr, status) {
            	let err = JSON.parse(xhr.responseText)
            	console.log(err)
            	removeLoading()
            }
        })
    }
})

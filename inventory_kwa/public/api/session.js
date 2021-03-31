get_user()

function get_user() {
    $.ajax({
        url: api_url + 'user/get_user/' + id_user,
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            let value = result.data
            $('.name').html(value.name)
        },
        error: function(xhr) {
            if (xhr.statusText == 'Unauthorized') {
                $.ajax({
                    url: root + 'session/logout',
                    type: 'GET',
                    success: function() {
                        location.href = root + '?timeout'
                    }
                })
            } else {
                // get_user()
            }
        }
    })
}

$('#form').submit(function(e) {
    e.preventDefault()
    process()
})

function process() {
    const username = $('#username').val()
    const password = $('#password').val()
    buttonLoading()
    $.ajax({
        url: api_url + 'auth/login',
        type: 'POST',
        timeout: 5000,
        data: {
            username: username,
            password: password
        },
        success: function(result) {
            let value = result.data
            $.ajax({
                url: root + 'session/login',
                type: 'GET',
                data: {
                    id: value.user.id,
                    token: value.api_token,
                    level: value.user.user_level_id
                },
                success: function(result) {
                    location.href = root + 'dashboard'
                }
            })
        },
        error: function(xhr) {
            let err = JSON.parse(xhr.responseText)
            // console.log(xhr)
            $('.alert').show()
            removeLoading()
        }
    })
}

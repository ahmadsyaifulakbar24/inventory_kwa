$('#menu').click(function() {
    if (!$('.sidebar').hasClass('show')) {
        $('.sidebar').addClass('show')
        $('.sidebar').css('left', '0px')
        $('.overlay').show()
    } else {
        $('.sidebar').removeClass('show')
        $('.sidebar').css('left', '-230px')
        $('.overlay').hide()
    }
})
$('.overlay').click(function() {
    $('.sidebar').removeClass('show')
    $('.sidebar').css('left', '-230px')
    $(this).hide()
})
$('.password').click(function() {
    if ($(this).hasClass('mdi-eye')) {
        $(this).removeClass('mdi-eye')
        $(this).addClass('mdi-eye-off')
        if ($(this).data('id') == 'password') {
            $('#password').attr('type', 'password')
        } else if ($(this).data('id') == 'npassword') {
            $('#npassword').attr('type', 'password')
        } else {
            $('#cpassword').attr('type', 'password')
        }
    } else {
        $(this).addClass('mdi-eye')
        $(this).removeClass('mdi-eye-off')
        if ($(this).data('id') == 'password') {
            $('#password').attr('type', 'text')
        } else if ($(this).data('id') == 'npassword') {
            $('#npassword').attr('type', 'text')
        } else {
            $('#cpassword').attr('type', 'text')
        }
    }
})
$('#logout').click(function() {
    $.ajax({
        url: root + 'session/logout',
        type: 'GET',
        success: function() {
            location.href = root
        }
    })
})

function number(str) {
    str += ''
    x = str.split('.')
    x1 = x[0]
    x2 = x.length > 1 ? '.' + x[1] : ''
    let rgx = /(\d+)(\d{3})/
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2')
    }
    return x1 + x2
}

function customAlert(html) {
    $('.customAlert').html(html)
    $('.customAlert').animate({ bottom: "+=120px" }, 150)
    setTimeout(function() {
        $('.customAlert').animate({ bottom: "-=120px" }, 150)
    }, 3000)
}

function dateNow() {
    let date = new Date()
    let d = date.getDate()
    let m = (date.getMonth() + 1)
    let y = date.getFullYear()
    if (d.toString().length < 2) d = '0' + d;
    if (m.toString().length < 2) m = '0' + m;
    return (y + '-' + m + '-' + d)
}

function buttonLoading() {
    $('#submit').attr('disabled', true)
    $('#load').show()
    $('#text').hide()
}

function removeLoading() {
    $('#submit').attr('disabled', false)
    $('#load').hide()
    $('#text').show()
}

function delay(fn, ms) {
    let timer = 0
    return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
    }
}

function createCode(id, code) {
    var qrcode = new QRCode(document.getElementById('qrcode' + id), {
        text: root + 'tool/alker/' + code,
        width: 128,
        height: 128,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    })
}

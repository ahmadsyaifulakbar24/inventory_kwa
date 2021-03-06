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

function createQR(id, code) {
    var qrcode = new QRCode(document.getElementById('qrcode' + id), {
        text: root + 'alker/detail/' + btoa(code),
        width: 128,
        height: 128,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    })
}

function downloadQR(id) {
    let filename = $('#qrcode' + id).data('filename')
    html2canvas(document.querySelector('#qrcode' + id), {
        scale: 1
    }).then(function(canvas) {
        saveQR(canvas.toDataURL(), filename + '.png')
    })
}

function saveQR(uri, filename) {
    var link = document.createElement('a')
    if (typeof link.download === 'string') {
        link.href = uri
        link.download = filename
        document.body.appendChild(link)
        link.click()
        document.body.removeChild(link)
    } else {
        window.open(uri)
    }
}

function pagination(links, meta, path) {
    let current = meta.current_page
    let replace = path + '?page='

    let first = links.first.replace(replace, '')
    if (first != current) {
        $('#first').removeClass('disabled')
        $('#first').data('id', first)
    } else {
        $('#first').addClass('disabled')
    }

    if (links.prev != null) {
        $('#prev').removeClass('disabled')
        let prev = links.prev.replace(replace, '')
        $('#prev').data('id', prev)

        $('#prevCurrent').show()
        $('#prevCurrent span').html(prev)
        $('#prevCurrent').data('id', prev)

        let prevCurrentDouble = prev - 1
        if (prevCurrentDouble > 0) {
            $('#prevCurrentDouble').show()
            $('#prevCurrentDouble span').html(prevCurrentDouble)
            $('#prevCurrentDouble').data('id', prevCurrentDouble)
        } else {
            $('#prevCurrentDouble').hide()
        }
    } else {
        $('#prev').addClass('disabled')
        $('#prevCurrent').hide()
        $('#prevCurrentDouble').hide()
    }

    $('#current').addClass('active')
    $('#current span').html(current)

    if (links.next != null) {
        $('#next').removeClass('disabled')
        let next = links.next.replace(replace, '')
        $('#next').data('id', next)

        $('#nextCurrent').show()
        $('#nextCurrent span').html(next)
        $('#nextCurrent').data('id', next)

        let nextCurrentDouble = ++next
        if (nextCurrentDouble <= meta.last_page) {
            $('#nextCurrentDouble').show()
            $('#nextCurrentDouble span').html(nextCurrentDouble)
            $('#nextCurrentDouble').data('id', nextCurrentDouble)
        } else {
            $('#nextCurrentDouble').hide()
        }
    } else {
        $('#next').addClass('disabled')
        $('#nextCurrent').hide()
        $('#nextCurrentDouble').hide()
    }

    let last = links.last.replace(replace, '')
    if (last != current) {
        $('#last').removeClass('disabled')
        $('#last').data('id', last)
    } else {
        $('#last').addClass('disabled')
    }

    $('#pagination').removeClass('hide')
    $('#pagination-label').html(`Showing ${meta.from} to ${meta.to} of ${meta.total} entries`)
}

function status_pengadaan(param) {
    let status
    switch (param) {
        case 'pending':
            status = '<span class="text-warning">Pending</span>'
            break;
        case 'approve':
            status = '<span class="text-success">Disetujui</span>'
            break;
        case 'decline':
            status = '<span class="text-danger">Ditolak</span>'
            break;
        case 'selected':
            status = '<span class="text-primary">Dipilih</span>'
            break;
        case 'processed':
            status = '<span class="text-warning">Diproses</span>'
            break;
        case 'finish':
            status = '<span class="text-success">Selesai</span>'
    }
    return status
}

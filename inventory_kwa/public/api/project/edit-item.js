let item = []
let append, appendItem, unit, col, del, sta, dis, acp = 0

apiItem()

function apiItem() {
    $.ajax({
        url: api_url + 'item/get',
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $.each(result.data, function(index, value) {
                item[index] = {
                    id: value.id,
                    kode: value.kode,
                    nama_barang: value.nama_barang,
                    keterangan: value.keterangan,
                    satuan: value.satuan,
                    jenis: value.jenis,
                    stock: value.stock
                }
            })
            apiProject()
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiItem()
            }, 1000)
        }
    })
}

function apiProject() {
    $.ajax({
        url: api_url + 'project/get/' + id,
        type: 'GET',
        timeout: 5000,
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            let value = result.data
            // console.log(value)
            $('#project_name').val(value.project_name)
            $.each(value.project_items, function(index, value) {
                if (value.status == 'pending') {
                    addItem(value.id, 'u')
                } else if (value.status == 'accepted') {
                    addItem(value.id, 'a')
                    acp++
                } else {
                    addItem(value.id, 'n')
                }
                $('select[name="item_id[' + value.id + ']"]').find('option[value="' + value.item.id + '"]').attr('selected', 'selected')
                $('input[name="quantity[' + value.id + ']"]').val(value.quantity)
                $('input[name="quantity[' + value.id + ']"]').parents('.input-group').find('.input-group-text').html(value.item.satuan)
            })
            $('#form').show()
            $('#loading').addClass('hide')
            $('#submit').attr('disabled', false)
        },
        error: function(xhr, status) {
            setTimeout(function() {
                apiProject()
            }, 1000)
        }
    })
}

$('#add-item').click(function() {
    let length = $('.select-n').length + 1
    addItem(length, 'n')
})

$(document).on('change', 'select', function() {
    unit = $(this).find(':selected').data('unit')
    $(this).parents('.form-group').siblings('.request').find('input').attr('disabled', false)
    $(this).parents('.form-group').siblings('.request').find('input').focus()
    $(this).parents('.form-group').siblings('.request').find('input').val('')
    $(this).parents('.form-group').siblings('.request').find('.input-group-text').html(unit)
})

$(document).on('click', '.close', function() {
    $(this).parents('.form-data').remove()
    $('select.select-n').each(function(i, o) {
        $(this).attr('name', 'item_id[' + (i + 1) + ']')
    })
    $('input.input-n').each(function(i, o) {
        $(this).attr('name', 'quantity[' + (i + 1) + ']')
        $(this).data('id', (i + 1))
    })
    let length = $('.select-n').length + 1
    if (($('select.select-u').length - acp) == 0) {
        length == 1 ? addItem(length, 'n') : ''
    }
})

function addItem(dataItem, status) {
	append = ''
    $.each(item, function(index, value) {
        append += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    if(status == 'a') {
    	sta = 'u'
    	dis = 'disabled'
    	col = 'col-lg-6 col-md-7'
    	del = ''
    } else {
	    if(status == 'u') {
			sta = 'u'
		} else {
			sta = 'n'
		}
		dis = ''
		col = 'col-md-6 col-11'
    	del =
		`<div class="close mt-1" role="button">
			<i class="mdi mdi-close mdi-18px pr-0"></i>
		</div>`
    }
    appendItem =
        `<div class="form-data" data-item="${dataItem}">
		<div class="form-group row">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
			<div class="col-xl-5 ${col}">
				<select name="item_id[${dataItem}]" class="custom-select select-${sta}" role="button" ${dis}>
					<option disabled selected>Pilih</option>
					${append}
				</select>
				<div class="invalid-feedback">Pilih nama barang.</div>
			</div>
			${del}
		</div>
		<div class="form-group row request">
			<label class="col-xl-3 col-lg-4 col-md-5 col-form-label">Request Barang</label>
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="input-group">
					<input type="number" name="quantity[${dataItem}]" data-id="${dataItem}" data-status="${sta}" class="form-control input-${sta}" ${dis}>
					<div class="input-group-append">
						<span class="input-group-text">Satuan</span>
					</div>
					<div class="invalid-feedback">Masukkan request barang.</div>
				</div>
			</div>
		</div>
		<div class="form-group row mb-2 mb-md-3">
			<div class="col-xl-8 col-lg-10 col-12"><hr></div>
		</div>
	</div>`
    $('#data-' + status).append(appendItem)
}

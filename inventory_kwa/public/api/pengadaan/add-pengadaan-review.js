let item = []
let item_stage = []
let item_length = 0
let item_stage_length = -1

get_pengadaan_request_item()

function get_pengadaan_request_item() {
    $.ajax({
        url: api_url + 'pengadaan_request/filter_pengadaan_request_item',
        type: 'GET',
        data: {
            status: 'pending'
        },
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            // console.log(result)
            $.each(result.data, function(index, value) {
                if (value.main_alker != null) {
                    item[index] = {
                        id: value.id,
                        nama_barang: `${value.main_alker.nama_barang} (${value.total} ${value.main_alker.satuan})`,
                        satuan: value.main_alker.satuan
                    }
                } else {
                    item[index] = {
                        id: value.id,
                        nama_barang: `${value.item_id.nama_barang} (${value.total} ${value.item_id.satuan})`,
                        satuan: value.item_id.satuan
                    }
                }
                item_length++
            })
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_pengadaan_request_item()
            }, 1000)
        }
    })
}

$('#add_item').click(function() {
    let length = $('.form-item').length + 1
    add_item(length)
})

    console.log(item)
$(document).on('change', '.item_id', function() {

    console.clear()
    let value = $(this).val()
    let nama_barang = $(this).find(':selected').html()
    let satuan = $(this).find(':selected').data('unit')

	for(var i = 0; i < item.length; i++) {
	    if(item[i].id == value) {
	        item.splice(i, 1)
	        // item_stage_length++
			item_stage[i] = {
			    id: parseInt(value),
			    nama_barang: nama_barang,
			    satuan: satuan
			}
	        break
	    }
	}


    console.log(item)
    console.log(item_stage)

    $(this).parents('.form-group').siblings('.request').find('input').focus()
})

$(document).on('keyup', '.price', function() {
    let value = $(this).val()
    $(this).val(convert(value))
})

$(document).on('click', '.close-item', function() {
    if ($('.form-item').length > 1) {
        $(this).parents('.form-item').slideUp('fast', function() {
        	let id = $(this).find('.item_id').val()
        	let nama_barang = $(this).find('.item_id').find(':selected').html()
        	let satuan = $(this).find('.item_id').find(':selected').data('unit')
            // console.log(id)
            // console.log(nama_barang)
            // console.log(satuan)
   //          item[item.length] = {
			//     id: parseInt(id),
			//     nama_barang: nama_barang,
			//     satuan: satuan
			// }
		    for(var i = 0; i < item_stage.length; i++) {
			    if(item_stage[i].id == id) {
			        item_stage.splice(i, 1)
			        // item_stage_length++
					item[i] = {
					    id: parseInt(id),
					    nama_barang: nama_barang,
					    satuan: satuan
					}
			        break
			    }
			}
			console.clear()
		    console.log(item)
		    console.log(item_stage)

            $(this).remove()
            $('.number').each(function(i, o) {
                $(this).html((i + 1) + ')')
            })
            $('.item_id').each(function(i, o) {
                $(this).attr('data-id', (i + 1))
            })
            $('.price').each(function(i, o) {
                $(this).attr('data-id', (i + 1))
            })
            let length = $('.form-item').length + 1
            length == 1 ? add_item(length) : ''
        })
    }
})

function add_item(id) {
    let append, option = ''
    if (id == undefined) id = 1
    $.each(item, function(index, value) {
        option += `<option value="${value.id}" data-unit="${value.satuan}">${value.nama_barang}</option>`
    })
    append = `<div class="form-item">
		<div class="form-group row">
			<div class="col-12"><hr></div>
		</div>
        <div class="row">
        	<div class="col-md-4 col-2">
        		<h3 class="number text-center">${id})</h3>
        	</div>
        	<div class="col-md-7 col-9">
				<div class="form-group">
					<label class="form-label">Nama Alker & Salker/Material</label>
					<div class="close form-close close-item" title="Hapus">
						<i class="mdi mdi-trash-can-outline mdi-18px pr-0"></i>
					</div>
					<select class="custom-select item_id" data-id="${id}" role="button">
						<option disabled selected>Pilih</option>
						${option}
					</select>
					<div class="invalid-feedback">Pilih nama alker & salker/material</div>
				</div>
				<div class="form-group request">
					<label class="form-label">Harga Satuan</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp</span>
						</div>
						<input type="tel" class="form-control price" data-id="${id}">
						<div class="invalid-feedback">Masukkan harga satuan</div>
					</div>
				</div>
			</div>
		</div>
	</div>`
    if (id <= item_length) {
        $('#data').append(append)
        if (id != 1) $('#data').find('.form-item').last().hide().slideDown('fast')
    }
}

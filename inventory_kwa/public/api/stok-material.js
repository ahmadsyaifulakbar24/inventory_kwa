get_item()

function get_item() {
    $.ajax({
        url: api_url + 'item/get',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append, danger
                $.each(result.data, function(index, value) {
                    value.stock < 5 ? danger = 'text-danger' : danger = ''
                    append =`<div class="col-md-4 col-6 mb-4">
						<div class="card rounded">
							<div class="card-body">
								<h6 class="font-weight-bold">${value.nama_barang}</h6>
								<div class="d-flex justify-content-between align-items-center position-relative">
									<h6 class="mb-0 ${danger}">${value.stock} ${value.satuan}</h6>
									<div class="notification none"></div>
								</div>
							</div>
						</div>
					</div>`
                    $('#' + value.jenis).append(append)
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_item()
            }, 1000)
        }
    })
}

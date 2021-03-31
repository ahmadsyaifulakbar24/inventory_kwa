get_main_alker()

function get_main_alker() {
    $.ajax({
        url: api_url + 'alker/get_main_alker',
        type: 'GET',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function(result) {
            $('#loading').addClass('hide')
            if (result.data.length > 0) {
                $('#data').removeClass('hide')
                let append
                $.each(result.data, function(index, value) {
                    if (value.total_alker_gudang > 0) {
                        append =`<div class="col-md-4 col-6 mb-4">
							<div class="card card-custom card-height">
								<div class="card-body">
									<h6 class="font-weight-bold">${value.nama_barang}</h6>
									<div class="d-flex justify-content-between align-items-center position-relative">
										<h6 class="mb-0">${value.total_alker_gudang} ${value.satuan}</h6>
										<div class="notification none"></div>
									</div>
								</div>
							</div>
						</div>`
                        $('#data').append(append)
                    }
                })
            } else {
                $('#empty').removeClass('hide')
            }
        },
        error: function(xhr, status) {
            setTimeout(function() {
                get_main_alker()
            }, 1000)
        }
    })
}

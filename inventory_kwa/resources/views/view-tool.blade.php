@extends('layouts/app')

@section('content')
	@if(session("level") == 100)
	<div class="container container-compose">
	@else
	<div class="container">
	@endif
		<div class="d-flex justify-content-between align-items-center">
			<h5 id="nama_barang"></h5>
			@if(session("level") == 100)
			<a href="#" class="btn btn-sm btn-outline-primary hide" id="edit">Edit Material</a>
			@endif
		</div>
		<div class="mb-5 hide" id="data">
			<div class="d-flex justify-content-between align-items-end mb-2">
				<div>
					<div class="text-secondary">Total stok: <span id="stok">0</span></div>
					<div class="text-secondary pt-1">Total barang keluar: <span id="keluar">0</span></div>
				</div>
				<div>
					<select class="custom-select custom-select-sm" id="filter" role="button">
						<option value="all">Semua Status</option>
						<option value="in">Di Gudang</option>
						<option value="out">Sudah Keluar</option>
					</select>
				</div>
			</div>
			<div class="card card-custom">
				<div class="table-custom">
					<div class="table-responsive">
						<table class="table table-middle">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-truncate">Kode Alker/Salker</th>
									<th class="text-truncate">Keterangan</th>
									<th class="text-truncate">Status</th>
									<th class="text-truncate">QR Code</th>
								</tr>
							</thead>
							<tbody id="data_get_alker"></tbody>
							<tbody id="loading_data" class="none">
								<tr>
									<td colspan="5" class="text-center">
										<div class="loader loader-sm">
											<svg class="circular" viewBox="25 25 50 50">
												<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
											</svg>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<nav class="card-footer" id="pagination">
					<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
						<small class="text-secondary pb-3 pb-md-0" id="pagination-label"></small>
						<nav>
							<ul class="pagination pagination-sm mb-0" data-filter="request">
								<li class="page page-item disabled" id="first">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-double-left"></i></span>
								</li>
								<li class="page page-item disabled" id="prev">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-left"></i></span>
								</li>
								<li class="page page-item" id="prevCurrentDouble"><span class="page-link"></span></li>
								<li class="page page-item" id="prevCurrent"><span class="page-link"></span></li>
								<li class="page page-item" id="current"><span class="page-link"></span></li>
								<li class="page page-item" id="nextCurrent"><span class="page-link"></span></li>
								<li class="page page-item" id="nextCurrentDouble"><span class="page-link"></span></li>
								<li class="page page-item" id="next">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-right"></i></span>
								</li>
								<li class="page page-item" id="last">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-double-right"></i></span>
								</li>
							</ul>
						</nav>
					</ul>
				</nav>
			</div>
		    <div id="qrcode" style="position: fixed; opacity: 0.0"></div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-package-variant mdi-48px"></i>
			<h5>Belum ada Alker</h5>
			<p class="text-secondary">Tambah Alker untuk menambah Alker baru.</p>
			<!-- <a href="#" class="edit btn btn-sm btn-outline-primary">Edit Alker</a> -->
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		@if(session("level") == 100)
		<div class="compose">
			<a href="#" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i>Tambah Alker
			</a>
		</div>
		@endif
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Hapus Alker</h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0"></div>
				<div class="modal-footer border-top-0">
					<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
					<button class="btn btn-sm btn-primary" id="delete">Hapus</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/view-tool.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
	<script src="{{asset('assets/vendors/html2canvas.min.js')}}"></script>
@endsection
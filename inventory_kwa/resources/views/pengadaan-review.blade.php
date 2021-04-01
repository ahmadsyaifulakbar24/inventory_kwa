@extends('layouts/app')

@section('title','Pengadaan Review')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Pengadaan Review</h5>
		</div>
		<div class="card card-custom none" id="data">
			<div class="table-custom">
				<div class="table-responsive">
					<table class="table mb-0">
						<thead id="warehouse">
							<tr>
								<th class="text-center">No.</th>
								<th class="text-truncate">Supplier</th>
								<th class="text-truncate">Kontak/Link Supplier</th>
								<th class="text-truncate">Nama Alker & Salker/Material</th>
								<th class="text-truncate">Total Request</th>
								<th class="text-truncate">Harga Satuan</th>
								<th class="text-truncate">Status</th>
								<th class="text-truncate">Tanggal Request</th>
								<th class="text-truncate">Tanggal Approve Dir Teknisi</th>
								<th class="text-truncate">Tanggal Approve Dirut</th>
								<th class="text-truncate">Bukti Transfer</th>
								<th class="text-truncate">Kuitansi</th>
								<th class="text-truncate"></th>
							</tr>
						</thead>
						<thead id="dirtek">
							<tr>
								<th class="text-center">No.</th>
								<th class="text-truncate">Supplier</th>
								<th class="text-truncate">Kontak/Link Supplier</th>
								<th class="text-truncate">Nama Alker & Salker/Material</th>
								<th class="text-truncate">Total Request</th>
								<th class="text-truncate">Harga Satuan</th>
								<th class="text-truncate">Status</th>
								<th class="text-truncate">Tanggal Request</th>
								<th class="text-truncate">Tanggal Approve Dir Teknisi</th>
								<th class="text-truncate">Tanggal Approve Dirut</th>
								<th class="text-truncate">Bukti Transfer</th>
								<th class="text-truncate">Kuitansi</th>
							</tr>
						</thead>
						<thead id="dirut">
							<tr>
								<th class="text-truncate">No.</th>
								<th class="text-truncate">Supplier</th>
								<th class="text-truncate">Kontak/Link Supplier</th>
								<th class="text-truncate">Nama Alker & Salker/Material</th>
								<th class="text-truncate">Total Request</th>
								<th class="text-truncate">Harga Satuan</th>
								<th class="text-truncate">Status</th>
								<th class="text-truncate">Tanggal Request</th>
								<th class="text-truncate">Tanggal Approve Dir Teknisi</th>
								<th class="text-truncate">Tanggal Approve Dirut</th>
							</tr>
						</thead>
						<tbody id="table"></tbody>
					</table>
				</div>
			</div>
			<div class="card-footer hide" id="pagination">
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
				</div>
			</div>
		</div>
		<div class="none" id="empty">
			<div class="d-flex flex-column justify-content-center align-items-center state">
				<i class="mdi mdi-clipboard-outline mdi-48px pr-0"></i>
				<h5>Belum ada Pengadaan Review</h5>
				<p class="text-secondary">Review Pengadaan untuk setujui Pengadaan baru</p>
			</div>
		</div>
		<div id="loading">
			<div class="d-flex flex-column justify-content-center align-items-center state">
				<div class="loader">
					<svg class="circular" viewBox="25 25 50 50">
						<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
					</svg>
				</div>
			</div>
		</div>
		@if(session("level") == 101)
		<div class="compose">
			<a href="{{url('create/pengadaan-review')}}" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i> Review Pengadaan
			</a>
		</div>
		@endif
	</div>
	<div class="modal fade" id="modal-approve" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Approve Pengadaan</h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0">
					Anda yakin approve pengadaan?
				</div>
				<div class="modal-footer border-top-0">
					<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
					<button class="btn btn-sm btn-primary" id="approve">Approve</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-upload" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title" id="modal-upload-title"></h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<form enctype="multipart/form-data">
					<div class="modal-body py-0">
						<div class="form-group">
							<div id="form-file">
								<div class="file-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="file" role="button" accept="image/jpeg, image/png">
										<label class="custom-file-label">Pilih File</label>
										<div id="file-feedback" class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div id="file-feedback" class="invalid-feedback">Format file wajib berupa PDF</div>
						</div>
					</div>
					<div class="modal-footer border-top-0">
						<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
						<button class="btn btn-sm btn-primary" id="upload">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-finish" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Pengadaan Selesai</h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0">
					Anda yakin selesaikan pengadaan?
				</div>
				<div class="modal-footer border-top-0">
					<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
					<button class="btn btn-sm btn-primary" id="finish">Selesai</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/pengadaan-review.js')}}"></script>
	<script src="{{asset('assets/js/file.js')}}"></script>
@endsection
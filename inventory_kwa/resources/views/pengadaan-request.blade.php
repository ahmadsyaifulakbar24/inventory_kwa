@extends('layouts/app')

@section('title','Pengadaan Request')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Pengadaan Request</h5>
		</div>
		<div class="card card-custom none" id="data">
			<div class="table-custom">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-truncate">Jenis Pengadaan</th>
								<th class="text-truncate">Nama Alker & Salker/Material</th>
								<th class="text-truncate">Total Request</th>
								<th class="text-truncate">Status</th>
								<th class="text-truncate">Tanggal Request</th>
								<th></th>
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
				<h5>Belum ada Pengadaan Request</h5>
				<p class="text-secondary">Request Pengadaan untuk membuat Pengadaan baru</p>
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
		@if(session("level") == 102)
		<div class="compose">
			<a href="{{url('create/pengadaan-request')}}" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i> Request Pengadaan
			</a>
		</div>
		@endif
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Hapus Pengadaan</h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0">
					Anda yakin hapus pengadaan?
				</div>
				<div class="modal-footer border-top-0">
					<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
					<button class="btn btn-sm btn-primary" id="delete">Hapus</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/pengadaan-request.js')}}"></script>
@endsection
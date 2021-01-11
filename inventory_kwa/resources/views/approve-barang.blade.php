@extends('layouts/app')

@section('title','Approve Barang')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<div class="d-flex justify-content-between align-items-end">
				<h5 class="mb-3">Approve Barang</h5>
				<div class="mb-2 pb-1 position-relative">
					<i class="mdi mdi-close-circle position-absolute hide px-2" id="search-close" role="button" style="right: 0;padding: 5px 0"></i>
					<input class="form-control form-control-sm pr-4" placeholder="Cari Site/Project..." id="search" autocomplete="off">
				</div>
			</div>
			<div class="table-responsive" id="table-container">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Nama Site/Project</th>
							<th class="text-truncate">Kode Barang</th>
							<th class="text-truncate">Nama Barang</th>
							<th class="text-truncate">Request Barang</th>
							<th class="text-truncate">Kategori</th>
							<th class="text-truncate">Stok</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate">Tanggal Request</th>
							<th class="text-truncate">Tanggal Approve</th>
							<th class="text-truncate">Nama Supplier</th>
							<th class="text-truncate">Kontak Supplier</th>
							<th class="text-truncate" colspan="2">Foto</th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
					<tbody id="table-data-loading" class="hide">
						<tr>
							<td colspan="15" class="text-center">
								<img src="{{asset('assets/images/ajax-loader.gif')}}" width="25">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="d-flex flex-column justify-content-center align-items-center state hide" id="table-empty">
				<i class="mdi mdi-close-circle mdi-48px pr-0"></i>
				<h5>Project tidak ditemukan</h5>
				<p class="text-secondary text-center">Periksa kembali nama Site/Project.</p>
			</div>
			<div class="d-flex flex-column justify-content-center align-items-center state hide" id="table-loading">
				<div class="loader">
					<svg class="circular" viewBox="25 25 50 50">
						<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
					</svg>
				</div>
			</div>
			<nav id="pagination">
				<ul class="pagination pb-3" data-filter="request">
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
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada pengajuan barang</h5>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('assets/js/checkbox.js')}}"></script> -->
	<script src="{{asset('api/approve-barang.js')}}"></script>
@endsection
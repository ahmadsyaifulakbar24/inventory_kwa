@extends('layouts/app')

@section('title','Daftar Teknisi')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<h5 class="mb-3">Daftar Teknisi</h5>
			<div class="table-responsive">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Nama Teknisi</th>
							<th class="text-truncate">NIK</th>
							<th class="text-truncate">Email</th>
							<th class="text-truncate">Telepon</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate">Alamat</th>
							<th><i class="mdi mdi-trash-all mdi-trash-can-outline mdi-18px pr-0 none text-danger" role="button" data-toggle="modal" data-target="#modal-delete"></i></th>
						</tr>
					</thead>
					<tbody id="data_get_employee"></tbody>
					<tbody id="loading_data_get_employee" class="hide">
						<tr>
							<td colspan="8" class="text-center">
								<img src="{{asset('assets/images/ajax-loader.gif')}}" width="25">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<nav id="pagination" class="none">
				<ul class="pagination pb-3">
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
			<i class="mdi mdi-account-circle-outline mdi-48px"></i>
			<h5>Belum ada Teknisi</h5>
			<p class="text-secondary">Tambah Teknisi untuk menambah Teknisi baru.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		<div class="compose">
			<a href="{{url('create/teknisi')}}" class="btn btn-primary d-flex align-items-center shadow px-3" style="border-radius:100px">
				<i class="mdi mdi-plus-thick mdi-18px"></i> Tambah Teknisi
			</a>
		</div>
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Hapus Teknisi</h5>
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
	<!-- <script src="{{asset('assets/js/checkbox.js')}}"></script> -->
	<script src="{{asset('api/teknisi.js')}}"></script>
@endsection
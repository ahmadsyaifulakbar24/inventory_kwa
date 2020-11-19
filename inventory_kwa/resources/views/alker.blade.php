@extends('layouts/app')

@section('title','Daftar Alker')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<h5 class="mb-3">Daftar Alker</h5>
			<div class="table-responsive">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Nama Barang</th>
							<th class="text-truncate">STO</th>
							<th class="text-truncate">Teknisi</th>
							<th class="text-truncate">Jenis</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate" colspan="2">Foto</th>
							<th><i class="mdi mdi-trash-all mdi-trash-can-outline mdi-18px pr-0 none text-danger" role="button" data-toggle="modal" data-target="#modal-delete"></i></th>
						</tr>
					</thead>
					<tbody id="dataTable"></tbody>
				</table>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada Alker</h5>
			<p class="text-secondary">Tambah Alker untuk membuat Alker baru.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		<div class="compose">
			<a href="{{url('create/alker')}}" class="btn btn-primary d-flex align-items-center shadow px-3" style="border-radius:100px">
				<i class="mdi mdi-plus-thick mdi-18px"></i> Tambah Alker
			</a>
		</div>
	</div>
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
		<div class="modal-sm modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Hapus Project</h5>
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
	<script src="{{asset('api/alker.js')}}"></script>
@endsection
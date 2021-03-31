@extends('layouts/app')

@section('title','Daftar Teknisi')

@section('content')
	<div class="container container-compose">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Daftar Teknisi</h5>
		</div>
		<div class="card card-custom hide" id="data">
			<div class="table-custom">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Nama Teknisi</th>
								<th>NIK</th>
								<th>Email</th>
								<th>Telepon</th>
								<th>Status</th>
								<th>Alamat</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="data_get_employee"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-account-circle-outline mdi-48px"></i>
			<h5>Belum ada Teknisi</h5>
			<p class="text-secondary">Tambah Teknisi untuk menambah Teknisi baru.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		<div class="compose">
			<a href="{{url('create/teknisi')}}" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i>Tambah Teknisi
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
	<script src="{{asset('api/teknisi.js')}}"></script>
@endsection
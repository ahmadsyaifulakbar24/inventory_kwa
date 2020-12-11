@extends('layouts/app')

@section('title','Approve Alker')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<h5 class="mb-3">Approve Alker</h5>
			<div class="table-responsive">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Kode Alker</th>
							<th class="text-truncate">Nama Barang</th>
							<th class="text-truncate">STO</th>
							<th class="text-truncate">Teknisi</th>
							<th class="text-truncate">Kegunaan</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate" colspan="2">Foto</th>
						</tr>
					</thead>
					<tbody id="dataTable"></tbody>
				</table>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada pengajuan Alker</h5>
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
	<script src="{{asset('api/approve-alker.js')}}"></script>
@endsection
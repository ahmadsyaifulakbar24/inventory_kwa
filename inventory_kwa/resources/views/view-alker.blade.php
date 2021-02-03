@extends('layouts/app')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<h5 id="kode_alker"></h5>
			<p class="text-secondary" id="alker">
			<div class="table-responsive">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Penanggungjawab Teknisi</th>
							<th class="text-truncate">STO</th>
							<th class="text-truncate">Kegunaan</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate" colspan="2">Foto</th>
						</tr>
					</thead>
					<tbody id="data_get_alker_request_by_group"></tbody>
				</table>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada Alker/Salker</h5>
			<p class="text-secondary">Tambah Alker/Salker untuk membuat alker/salker baru.</p>
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
				<i class="mdi mdi-plus-thick mdi-18px"></i> Tambah Alker/Salker
			</a>
		</div>
	</div>
@endsection

@section('script')
	<!-- <script src="{{asset('assets/js/checkbox.js')}}"></script> -->
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/view-alker.js')}}"></script>
@endsection
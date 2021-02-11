@extends('layouts/app')

@section('title','Approve Alker & Salker')

@section('content')
	<div class="container">
		<div class="mb-5 hide" id="data">
			<h5 class="mb-3">Approve Alker & Salker</h5>
			<div class="table-responsive">
				<table class="table border">
					<thead>
						<tr>
							<th><i class="mdi mdi-check-all mdi-checkbox-blank-outline mdi-18px pr-0" role="button"></i></th>
							<th class="text-truncate">Kode Alker/Salker</th>
							<th class="text-truncate">Nama Material</th>
							<th class="text-truncate">STO</th>
							<th class="text-truncate">Penanggungjawab Teknisi</th>
							<th class="text-truncate">Kegunaan</th>
							<th class="text-truncate">Keterangan</th>
							<th class="text-truncate">Status</th>
							<th class="text-truncate" colspan="2">Foto</th>
						</tr>
					</thead>
					<tbody id="data_get_alker_request"></tbody>
					<tbody id="loading_data_get_alker_request" class="none">
						<tr>
							<td colspan="9" class="text-center">
								<img src="{{asset('assets/images/ajax-loader.gif')}}" width="25">
							</td>
						</tr>
					</tbody>
				</table>
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
			<h5>Belum ada pengajuan Alker & Salker</h5>
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
@extends('layouts/app')

@section('title','Approve Alker & Salker')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Approve Alker & Salker</h5>
		</div>
		<div class="card card-custom hide" id="data">
			<div class="table-custom">
				<div class="table-responsive">
					<table class="table table-middle">
						<thead>
							<tr>
								<th class="text-center">No.</th>
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
								<td colspan="15" class="text-center">
									<div class="loader loader-sm">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
										</svg>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer" id="pagination">
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
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada pengajuan Alker & Salker</h5>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/approve-alker.js')}}"></script>
@endsection
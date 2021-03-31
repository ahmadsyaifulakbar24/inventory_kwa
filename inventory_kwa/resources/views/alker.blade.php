@extends('layouts/app')

@section('title','Daftar Alker & Salker')

@section('content')
	<div class="container container-compose">
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Daftar Alker & Salker</h5>
			<div class="position-relative">
				<select class="custom-select custom-select-sm" id="filter" role="button">
					<option value="in">Alker & Salker</option>
					<option value="all">Semua Alker & Salker</option>
				</select>
			</div>
		</div>
		<div id="get_alker_request_group" class="none">
			<div class="card card-custom">
			<div class="table-custom">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-truncate">Kode Alker/Salker</th>
									<th class="text-truncate">Nama Alker/Salker</th>
									<th class="text-truncate">Total Request</th>
								</tr>
							</thead>
							<tbody id="data_get_alker_request_group"></tbody>
							<tbody id="loading_data_get_alker_request_group">
								<tr>
									<td colspan="4" class="text-center">
										<div class="loader loader-sm btn-loading">
											<svg class="circular" viewBox="25 25 50 50">
												<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
											</svg>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer" id="pagination_group">
					<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
						<small class="text-secondary pb-3 pb-md-0" id="pagination-label"></small>
						<nav>
							<ul class="pagination pagination-sm mb-0" data-filter="group">
								<li class="page page-item disabled" id="groupFirst">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-double-left"></i></span>
								</li>
								<li class="page page-item disabled" id="groupPrev">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-left"></i></span>
								</li>
								<li class="page page-item" id="groupPrevCurrentDouble"><span class="page-link"></span></li>
								<li class="page page-item" id="groupPrevCurrent"><span class="page-link"></span></li>
								<li class="page page-item" id="groupCurrent"><span class="page-link"></span></li>
								<li class="page page-item" id="groupNextCurrent"><span class="page-link"></span></li>
								<li class="page page-item" id="groupNextCurrentDouble"><span class="page-link"></span></li>
								<li class="page page-item" id="groupNext">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-right"></i></span>
								</li>
								<li class="page page-item" id="groupLast">
									<span class="page-link"><i class="pr-0 mdi mdi-chevron-double-right"></i></span>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div id="get_alker_request" class="none">
			<div class="card card-custom">
				<div class="table-custom">
					<div class="table-responsive">
						<table class="table table-middle">
							<thead>
								<tr>
									<th class="text-truncate pl-4">No.</th>
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
							<tbody id="loading_data_get_alker_request">
								<tr>
									<td colspan="9" class="text-center">
										<div class="loader loader-sm btn-loading">
											<svg class="circular" viewBox="25 25 50 50">
												<circle class="path-dark" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
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
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px"></i>
			<h5>Belum ada Alker/Salker</h5>
			<p class="text-secondary">Tambah Alker/Salker untuk membuat alker/salker baru.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		<div class="compose">
			<a href="{{url('create/alker')}}" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i> Tambah Alker/Salker
			</a>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/alker.js')}}"></script>
@endsection
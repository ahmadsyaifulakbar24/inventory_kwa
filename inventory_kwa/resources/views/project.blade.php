@extends('layouts/app')

@section('title','Daftar Project')

@section('content')
	@if(session("level") == 102)
	<div class="container container-compose">
	@else
	<div class="container">
	@endif
		<div class="d-flex justify-content-between align-items-center mb-2">
			<h5>Daftar Project</h5>
			<div class="position-relative">
				<i class="mdi mdi-close-circle position-absolute hide px-2" id="search-close" role="button" style="right: 0;padding: 5px 0"></i>
				<input class="form-control form-control-sm pr-4" placeholder="Cari Site/Project..." id="search" autocomplete="off">
			</div>
		</div>
		<div class="card card-custom hide" id="data">
			<div class="table-custom">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-truncate">Nama Site/Project</th>
								<!-- <th class="text-truncate">Kode Material</th> -->
								<th class="text-truncate">Nama Material</th>
								<th class="text-truncate">Request Material</th>
								<th class="text-truncate">Kategori</th>
								<th class="text-truncate">Stok Material</th>
								<th class="text-truncate">Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="table"></tbody>
						<tbody id="table-loading" class="hide">
							<tr>
								<td colspan="15" class="text-center">
									<div class="loader loader-sm">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
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
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="table-empty">
			<i class="mdi mdi-close-circle mdi-48px pr-0"></i>
			<h5>Project tidak ditemukan</h5>
			<p class="text-secondary text-center">Periksa kembali nama Site/Project.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-clipboard-outline mdi-48px pr-0"></i>
			<h5>Belum ada Project</h5>
			<p class="text-secondary">Buat Project untuk membuat Project baru.</p>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		@if(session("level") == 102)
		<div class="compose">
			<a href="{{url('create/project')}}" class="btn btn-sm btn-primary d-flex align-items-center shadow">
				<i class="mdi mdi-plus mdi-18px"></i> Buat Project
			</a>
		</div>
		@endif
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
	<script src="{{asset('api/project.js')}}"></script>
@endsection
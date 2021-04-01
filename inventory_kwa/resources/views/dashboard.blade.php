@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<h5 class="pb-2">Dashboard</h5>
		<div class="row mb-3">
			@if(session("level") == "100" || session("level") == "103" || session("level") == "104")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('main-alker')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Alker & Salker</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-package-variant-closed mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "100")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('material')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Material</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-package-variant-closed mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "100")
		</div>
		<h6 class="text-uppercase text-secondary">User</h6>
		<div class="row pt-2 mb-3">
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('teknisi')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Teknisi</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-account-circle-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('supplier')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Supplier</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-account-circle-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "101")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('approve-alker')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Approve Alker & Salker</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-check-circle-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('approve-barang')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Approve Material</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-check-circle-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "102")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('alker')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Alker & Salker</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-clipboard-text-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "102" || session("level") == "103" || session("level") == "104")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('project')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Daftar Project</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-clipboard-text-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
		@if(session("level") == "101" || session("level") == "102" || session("level") == "103" || session("level") == "104")
		</div>
		<h6 class="text-uppercase text-secondary">Pengadaan</h6>
		<div class="row pt-2 mb-3">
		@endif
			@if(session("level") == "101" || session("level") == "102")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('pengadaan-request')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Pengadaan Request</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-clipboard-plus-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
			@if(session("level") == "101" || session("level") == "103" || session("level") == "104")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('pengadaan-review')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Pengadaan Review</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-clipboard-check-outline mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
		</div>
		<h6 class="text-uppercase text-secondary">Posisi Stok</h6>
		<div class="row pt-2 mb-3">
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('posisi-stok-alker')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Posisi Stok Alker & Salker</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-package-variant-closed mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('posisi-stok-material')}}">
					<div class="card card-custom card-height">
						<div class="card-body">
							<h6>Posisi Stok Material</h6>
							<div class="d-flex justify-content-between align-items-center position-relative">
								<i class="mdi mdi-package-variant-closed mdi-36px"></i>
								<h4 class="mb-0">
									<div class="loader loader-sm btn-loading hide">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="pathd" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
								</h4>
								<div class="notification none"></div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
@endsection
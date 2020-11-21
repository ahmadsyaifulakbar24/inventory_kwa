@extends('layouts/app')

@section('title','Dashboard')

@section('content')
	<div class="container">
		<h5>Dashboard</h5>
		<div class="row pt-2 mb-3">
			@if(session("level") == "100")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('tool')}}">
					<div class="card card-menu rounded">
						<div class="card-body">
							<h6>Daftar Alker</h6>
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
				<a href="{{url('barang')}}">
					<div class="card card-menu rounded">
						<div class="card-body">
							<h6>Daftar Barang</h6>
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
			@elseif(session("level") == "101")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('approve-alker')}}">
					<div class="card card-menu rounded">
						<div class="card-body">
							<h6>Approve Alker</h6>
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
					<div class="card card-menu rounded">
						<div class="card-body">
							<h6>Approve Barang</h6>
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
			@elseif(session("level") == "102")
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('alker')}}">
					<div class="card card-menu rounded">
						<div class="card-body">
							<h6>Daftar Alker</h6>
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
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('project')}}">
					<div class="card card-menu rounded">
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
			<div class="col-6 col-md-4 mb-4">
				<a href="{{url('material')}}">
					<div class="card card-menu rounded">
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
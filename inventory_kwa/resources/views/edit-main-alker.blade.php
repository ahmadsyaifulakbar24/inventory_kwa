@extends('layouts/app')

@section('title','Edit Material')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Edit Material</h5>
				<div class="card card-custom hide" id="data">
					<form class="card-body" id="form">
						<div class="form-group row">
							<label for="kode_main_alker" class="col-lg-4 col-md-5 col-form-label">Kode Material</label>
							<div class="col-lg-8 col-md-7">
								<input class="col-form-label form-control" id="kode_main_alker" disabled="disabled">
								<div class="invalid-feedback" id="kode_main_alker-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_barang" class="col-lg-4 col-md-5 col-form-label">Nama Material</label>
							<div class="col-lg-8 col-md-7">
								<input class="col-form-label form-control" id="nama_barang" autofocus="autofocus">
								<div class="invalid-feedback" id="nama_barang-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="unit" class="col-lg-4 col-md-5 col-form-label">Satuan</label>
							<div class="col-lg-8 col-md-7">
								<select id="satuan" class="custom-select" role="button">
									<option disabled selected>Pilih</option>
									<option value="Pcs">Pcs</option>
									<option value="Unit">Unit</option>
								</select>
								<div class="invalid-feedback" id="satuan-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<div class="offset-lg-4 offset-md-5 col-lg-8 col-md-7">
								<button class="btn btn-primary btn-block mt-3" id="submit">
									<div class="loader loader-sm none" id="load">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
									<span id="text">Simpan Material</span>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
					<div class="loader">
						<svg class="circular" viewBox="25 25 50 50">
							<circle class="path-primary" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
						</svg>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/edit-main-alker.js')}}"></script>
@endsection
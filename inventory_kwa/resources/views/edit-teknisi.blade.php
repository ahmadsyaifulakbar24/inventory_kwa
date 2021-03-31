@extends('layouts/app')

@section('title','Edit Teknisi')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Edit Teknisi</h5>
				<div class="card card-custom hide" id="data">
					<form id="form" class="card-body">
						<div class="form-group row">
							<label for="name" class="col-lg-4 col-md-5 col-form-label">Nama Teknisi</label>
							<div class="col-lg-8 col-md-7">
								<input id="name" class="form-control" autofocus="autofocus">
								<div class="invalid-feedback" id="name-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik" class="col-lg-4 col-md-5 col-form-label">NIK</label>
							<div class="col-lg-8 col-md-7">
								<input id="nik" class="form-control" type="tel">
								<div class="invalid-feedback" id="nik-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-lg-4 col-md-5 col-form-label">Email</label>
							<div class="col-lg-8 col-md-7">
								<input id="email" class="form-control" type="email">
								<div class="invalid-feedback" id="email-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-lg-4 col-md-5 col-form-label">Telepon</label>
							<div class="col-lg-8 col-md-7">
								<input id="no_hp" class="form-control" type="tel">
								<div class="invalid-feedback" id="no_hp-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-lg-4 col-md-5 col-form-label">Status</label>
							<div class="col-lg-8 col-md-7">
								<select id="status" class="custom-select" role="button">
									<option disabled selected>Pilih</option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
								</select>
								<div class="invalid-feedback" id="status-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-lg-4 col-md-5 col-form-label">Alamat</label>
							<div class="col-lg-8 col-md-7">
								<textarea id="alamat" class="form-control form-control-sm" rows="3"></textarea>
								<div class="invalid-feedback" id="alamat-feedback"></div>
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
									<span id="text">Simpan</span>
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
	<script src="{{asset('api/edit-teknisi.js')}}"></script>
@endsection
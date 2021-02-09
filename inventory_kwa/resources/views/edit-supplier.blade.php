@extends('layouts/app')

@section('title','Edit Supplier')

@section('content')
	<div class="container">
		<h5 class="mb-3">Edit Supplier</h5>
		<form class="hide" id="form" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="name" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Supplier</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<input id="name" class="form-control" autofocus="autofocus">
					<div class="invalid-feedback" id="name-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="type" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Tipe Supplier</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="type" class="custom-select" role="button">
						<option value="offline">Offline</option>
						<option value="online">Online</option>
					</select>
					<div class="invalid-feedback" id="type-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="contact" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kontak Supplier</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<input id="contact" class="form-control" type="tel">
					<div class="invalid-feedback" id="contact-feedback"></div>
				</div>
			</div>
			<div class="form-group row mt-5 mb-sm-5">
				<div class="offset-xl-3 offset-lg-4 offset-md-5 col-xl-5 col-lg-6 col-md-7">
					<button class="btn btn-primary btn-block" id="submit">
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
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/edit-supplier.js')}}"></script>
@endsection
@extends('layouts/app')

@section('title','Approve Barang')

@section('content')
	<div class="container">
		<h5 class="mb-3">Approve Barang</h5>
		<div id="form" class="hide">
			<div class="row">
				<div class="col-xl-8 col-lg-10">
					<div class="form-group row">
						<label for="project_name" class="col-lg-5 col-6 col-form-label text-secondary">Nama Site/Project</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="project_name"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="provinsi_id" class="col-lg-5 col-6 col-form-label text-secondary">Provinsi</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="provinsi_id"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="kab_kota_id" class="col-lg-5 col-6 col-form-label text-secondary">Kab/Kota</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="kab_kota_id"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="kecamatan" class="col-lg-5 col-6 col-form-label text-secondary">Kecamatan</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="kecamatan">asdasda</div>
						</div>
					</div>
			<div id="data"></div>
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
	<script src="{{asset('api/edit-approve-barang.js')}}"></script>
@endsection
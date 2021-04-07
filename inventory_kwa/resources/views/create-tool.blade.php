@extends('layouts/app')

@section('title','Tambah Alker')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Tambah Alker</h5>
				<div class="card card-custom hide" id="data">
					<form id="form" class="card-body">
						<div class="form-group row none">
							<label for="main_alker_id" class="col-lg-4 col-md-5 col-form-label">Alker</label>
							<div class="col-lg-8 col-md-7">
								<select id="main_alker_id" class="custom-select" role="button">
									<option disabled selected>Pilih</option>
								</select>
								<div class="invalid-feedback" id="main_alker_id-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-lg-4 col-md-5 col-form-label">Nama Barang</label>
							<div class="col-lg-8 col-md-7">
								<label class="col-form-label font-weight-bold" id="name"></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="code" class="col-lg-4 col-md-5 col-form-label">Kode Barang</label>
							<div class="col-lg-8 col-md-7">
								<label class="col-form-label font-weight-bold" id="code"></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="unit" class="col-lg-4 col-md-5 col-form-label">Satuan</label>
							<div class="col-lg-8 col-md-7">
								<label class="col-form-label font-weight-bold" id="unit"></label>
							</div>
						</div>
						<div class="form-group row">
							<label for="keterangan" class="col-lg-4 col-md-5 col-form-label">Keterangan</label>
							<div class="col-lg-8 col-md-7">
								<textarea class="form-control form-control-sm" id="keterangan" rows="3" autofocus="autofocus"></textarea>
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
									<span id="text">Tambah Alker</span>
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
	<script src="{{asset('api/create-tool.js')}}"></script>
@endsection
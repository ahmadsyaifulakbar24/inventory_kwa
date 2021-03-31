@extends('layouts/app')

@section('title','Edit Material')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Edit Material</h5>
				<div class="card card-custom hide" id="data">
					<form id="form" class="card-body">
						<div class="form-group row">
							<label for="kode" class="col-lg-4 col-md-5 col-form-label">Kode Material</label>
							<div class="col-lg-8 col-md-7">
								<input class="form-control" id="kode">
								<div class="invalid-feedback" id="kode-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_barang" class="col-lg-4 col-md-5 col-form-label">Nama Material</label>
							<div class="col-lg-8 col-md-7">
								<input class="form-control" id="nama_barang">
								<div class="invalid-feedback" id="nama_barang-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="keterangan" class="col-lg-4 col-md-5 col-form-label">Keterangan</label>
							<div class="col-lg-8 col-md-7">
								<textarea class="form-control form-control-sm" id="keterangan" rows="3"></textarea>
								<div class="invalid-feedback" id="keterangan-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="stok" class="col-lg-4 col-md-5 col-form-label">Stok</label>
							<div class="col-lg-8 col-md-7">
								<input type="number" class="form-control" id="stok"></input>
								<div class="invalid-feedback" id="stok-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="satuan" class="col-lg-4 col-md-5 col-form-label">Satuan</label>
							<div class="col-lg-8 col-md-7">
								<select id="satuan" class="custom-select" role="button">
									<option disabled selected>Pilih</option>
								</select>
								<div class="invalid-feedback" id="satuan-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis" class="col-lg-4 col-md-5 col-form-label">Jenis</label>
							<div class="col-lg-8 col-md-7">
								<select id="jenis" class="custom-select" role="button">
									<option disabled selected>Pilih</option>
									<option value="Kabel">Kabel</option>
									<option value="ODC">ODC</option>
									<option value="ODP">ODP</option>
									<option value="OTB">OTB</option>
									<option value="Pipa">Pipa</option>
									<option value="Tiang">Tiang</option>
								</select>
								<div class="invalid-feedback" id="jenis-feedback"></div>
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
	<script src="{{asset('api/edit-material.js')}}"></script>
@endsection
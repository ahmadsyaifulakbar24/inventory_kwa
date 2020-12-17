@extends('layouts/app')

@section('title','Approve Alker')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Approve Alker</h5>
		<div id="data" class="hide">
			<form id="form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xl-8 col-lg-10">
						<div class="form-group row form-file">
							<label for="front" class="col-lg-5 col-6 col-form-label text-secondary">Foto</label>
							<div class="col-lg-7 col-sm-6" id="front">
								<div class="file-group file-front">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="front_picture" data-picture="front" role="button" accept=".png, .jpg, .jpeg">
										<label class="custom-file-label">Pilih Foto Depan</label>
										<div id="front_picture-feedback" class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="offset-lg-5 offset-sm-6 col-lg-7 col-sm-6 pt-3" id="back">
								<div class="file-group file-back">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="back_picture" data-picture="back" role="button" accept=".png, .jpg, .jpeg">
										<label class="custom-file-label">Pilih Foto Belakang</label>
										<div id="back_picture-feedback" class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="offset-lg-5 offset-sm-6 col-lg-7 col-sm-6 pt-3">
								<button class="btn btn-primary btn-block" id="submit">
									<div class="loader loader-sm none" id="load">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
									<span id="text">Approve Alker</span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-xl-8 col-lg-10 col-12"><hr></div>
				</div>
			</form>
			<form id="form_ng" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xl-8 col-lg-10">
						<div class="form-group row">
							<label for="front" class="col-lg-5 col-6 col-form-label text-secondary">Status</label>
							<div class="col-lg-7 col-sm-6">
								<button class="btn btn-primary btn-block" id="submit">
									<div class="loader loader-sm none" id="load">
										<svg class="circular" viewBox="25 25 50 50">
											<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
										</svg>
									</div>
									<span id="text">Approve Alker</span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-xl-8 col-lg-10 col-12"><hr></div>
				</div>
			</form>

			<div class="row">
				<div class="col-xl-8 col-lg-10">
					<div class="form-group row">
						<label for="kode_main_alker" class="col-lg-5 col-6 col-form-label text-secondary">Kode Barang</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="kode_main_alker"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_barang" class="col-lg-5 col-6 col-form-label text-secondary">Nama Barang</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="nama_barang"></div>
						</div>
					</div>
					<div class="form-group row mb-0">
						<label for="satuan" class="col-lg-5 col-6 col-form-label text-secondary">Satuan</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="satuan"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row mb-0">
				<div class="col-xl-8 col-lg-10 col-12"><hr></div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-10">
					<div class="form-group row">
						<label for="kode_alker" class="col-lg-5 col-6 col-form-label text-secondary">Kode Alker</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="kode_alker"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="sto" class="col-lg-5 col-6 col-form-label text-secondary">STO</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="sto"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="teknisi" class="col-lg-5 col-6 col-form-label text-secondary">Penanggungjawab Teknisi</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="teknisi"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="kegunaan" class="col-lg-5 col-6 col-form-label text-secondary">Kegunaan</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold text-uppercase" id="kegunaan"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-lg-5 col-6 col-form-label text-secondary">Keterangan</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="keterangan"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-lg-5 col-6 col-form-label text-secondary">Status</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold text-capitalize" id="status"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="front" class="col-lg-5 col-6 col-form-label text-secondary">Foto</label>
						<div class="col-lg-7 col-6">
							<label class="col-form-label text-capitalize pr-2" id="front">
								<a target="_blank" id="fp">Depan</a>
							</label>
							<label class="col-form-label text-capitalize" id="back">
								<a target="_blank" id="bp">Belakang</a>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<label for="qrcode" class="col-lg-5 col-6 col-form-label text-secondary">QR Code</label>
						<div class="col-lg-7 col-6 pt-3" id="qrcode"></div>
					</div>
				</div>
			</div>
		</div>
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
	<script src="{{asset('api/alker/add-file.js')}}"></script>
	<script src="{{asset('api/edit-approve-alker.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
@endsection
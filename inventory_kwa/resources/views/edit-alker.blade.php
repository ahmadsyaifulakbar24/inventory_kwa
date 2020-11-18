@extends('layouts/app')

@section('title','Edit Alker')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Edit Alker</h5>
		<form id="form" enctype="multipart/form-data" class="hide">
			<div class="form-group row">
				<label for="item_id" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="item_id" class="custom-select" role="button">
						<option disabled selected>Pilih</option>
					</select>
					<div class="invalid-feedback" id="item_id-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="sto_id" class="col-xl-3 col-lg-4 col-md-5 col-form-label">STO</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="sto_id" class="custom-select" role="button">
						<option disabled selected>Pilih</option>
					</select>
					<div class="invalid-feedback" id="sto_id-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="teknisi_id" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Teknisi</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<div id="teknisi_id" data-id="null" class="custom-select" data-toggle="modal" data-target="#modal-teknisi" role="button">Cari Teknisi</div>
					<div class="invalid-feedback" id="teknisi_id-feedback">Masukkan teknisi</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="jenis" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Jenis</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="jenis" class="custom-select" role="button">
						<option disabled selected>Pilih</option>
					</select>
					<div class="invalid-feedback" id="jenis-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan_id" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Keterangan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="keterangan_id" class="custom-select" role="button">
						<option disabled selected>Pilih</option>
					</select>
					<div class="invalid-feedback" id="keterangan_id-feedback"></div>
				</div>
			</div>
			<div class="form-group row form-file hide">
				<label for="front" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Foto Depan</label>
				<div class="col-xl-5 col-lg-6 col-md-7" id="front">
					<div class="file-group file-front">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="front_picture" data-picture="front" role="button" accept=".png, .jpg, .jpeg">
							<label class="custom-file-label">Pilih Foto Depan</label>
							<div id="front_picture-feedback" class="invalid-feedback"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row form-file hide">
				<label for="back" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Foto Belakang</label>
				<div class="col-xl-5 col-lg-6 col-md-7" id="back">
					<div class="file-group file-back">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="back_picture" data-picture="back" role="button" accept=".png, .jpg, .jpeg">
							<label class="custom-file-label">Pilih Foto Belakang</label>
							<div id="back_picture-feedback" class="invalid-feedback"></div>
						</div>
					</div>
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
						<span id="text">Simpan Alker</span>
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
	<div class="modal fade" id="modal-teknisi" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h6 class="modal-title text-capitalize">Cari Teknisi</h6>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modal-disposisi">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0">
					<div class="form-group">
						<input class="form-control" id="search-teknisi" placeholder="Cari..." autocomplete="off">
					</div>
					<div id="teknisi" class="overflow-auto none" style="height:235px"></div>
					<div class="d-flex flex-column justify-content-center align-items-center" id="state" style="height:235px">
						<i class="mdi mdi-magnify mdi-48px"></i>
						<h5>Cari Teknisi</h5>
						<p class="text-secondary">Masukkan nama teknisi.</p>
					</div>
					<div class="d-flex flex-column justify-content-center align-items-center hide" id="empty" style="height:235px">
						<i class="mdi mdi-close-circle mdi-48px"></i>
						<h5>Teknisi tidak ditemukan</h5>
						<p class="text-secondary">Masukkan nama teknisi dengan benar.</p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-link px-4" data-dismiss="modal" data-toggle="modal" data-target="#modal-disposisi">Batal</button>
					<!-- <button type="button" class="btn btn-sm btn-primary px-4" id="btn-select" data-dismiss="modal">Pilih Penerima</button> -->
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/alker/add-teknisi.js')}}"></script>
	<script src="{{asset('api/alker/add-file.js')}}"></script>
	<script src="{{asset('api/edit-alker.js')}}"></script>
@endsection
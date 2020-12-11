@extends('layouts/app')

@section('title','Detail Alker')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Detail Alker</h5>
		<div id="data" class="hide">
			<div class="form-group row">
				<label for="kode_main_alker" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kode Barang</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="kode_main_alker"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="nama_barang" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="nama_barang"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="satuan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Satuan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="satuan"></label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xl-8 col-lg-10 col-12"><hr></div>
			</div>
			<div class="form-group row">
				<label for="kode_alker" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kode Alker</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="kode_alker"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="sto" class="col-xl-3 col-lg-4 col-md-5 col-form-label">STO</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="sto"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="teknisi" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Teknisi</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="teknisi"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="kegunaan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kegunaan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold text-uppercase" id="kegunaan"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Keterangan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold" id="keterangan"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="status" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Status</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label font-weight-bold text-capitalize" id="status"></label>
				</div>
			</div>
			<div class="form-group row">
				<label for="front" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Foto</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<label class="col-form-label text-capitalize pr-2" id="front">
						<a target="_blank" id="front_picture">Depan</a>
					</label>
					<label class="col-form-label text-capitalize" id="back">
						<a target="_blank" id="back_picture">Belakang</a>
					</label>
				</div>
			</div>
			<div class="form-group row mb-5">
				<label for="qrcode" class="col-xl-3 col-lg-4 col-md-5 col-form-label">QR Code</label>
				<div class="col-xl-5 col-lg-6 col-md-7 pt-2" id="qrcode"></div>
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
	<script src="{{asset('api/view-alker.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
@endsection
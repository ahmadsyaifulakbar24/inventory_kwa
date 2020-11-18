@extends('layouts/app')

@section('title','Tambah Barang')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Tambah Barang</h5>
		<form id="form" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="kode" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kode</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<input class="form-control" id="kode" autofocus="autofocus">
					<div class="invalid-feedback" id="kode-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="nama_barang" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<input class="form-control" id="nama_barang">
					<div class="invalid-feedback" id="nama_barang-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Keterangan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<textarea class="form-control" id="keterangan"></textarea>
					<div class="invalid-feedback" id="keterangan-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="satuan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Satuan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="satuan" class="custom-select" role="button">
						<option disabled selected>Pilih Satuan</option>
						<option value="Batang">Batang</option>
						<option value="Meter">Meter</option>
						<option value="Pack">Pack</option>
						<option value="Pcs">Pcs</option>
						<option value="Roll">Roll</option>
						<option value="Set">Set</option>
						<option value="Unit">Unit</option>
					</select>
					<div class="invalid-feedback" id="satuan-feedback"></div>
				</div>
			</div>
			<div class="form-group row">
				<label for="jenis" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Jenis</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="jenis" class="custom-select" role="button">
						<option disabled selected>Pilih Jenis</option>
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
				<label for="stok" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Stok</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<textarea class="form-control" id="stok"></textarea>
					<div class="invalid-feedback" id="stok-feedback"></div>
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
						<span id="text">Tambah Barang</span>
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/create-barang.js')}}"></script>
@endsection
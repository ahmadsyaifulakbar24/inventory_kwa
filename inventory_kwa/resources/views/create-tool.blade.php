@extends('layouts/app')

@section('title','Tambah Alker')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Tambah Alker</h5>
		<form id="form" enctype="multipart/form-data" class="hide">
			<div class="form-group row">
				<label for="main_alker_id" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Alker</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<select id="main_alker_id" class="custom-select" role="button">
						<option disabled selected>Pilih</option>
					</select>
					<div class="invalid-feedback" id="main_alker_id-feedback"></div>
				</div>
			</div>
			<div id="data" class="none">
				<div class="form-group row">
					<label for="name" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Barang</label>
					<div class="col-xl-5 col-lg-6 col-md-7">
						<label class="col-form-label font-weight-bold" id="name"></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="code" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Kode Barang</label>
					<div class="col-xl-5 col-lg-6 col-md-7">
						<label class="col-form-label font-weight-bold" id="code"></label>
					</div>
				</div>
				<div class="form-group row">
					<label for="unit" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Satuan</label>
					<div class="col-xl-5 col-lg-6 col-md-7">
						<label class="col-form-label font-weight-bold" id="unit"></label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Keterangan</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<textarea class="form-control" id="keterangan" rows="3"></textarea>
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
						<span id="text">Tambah Alker</span>
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
	<script src="{{asset('api/create-tool.js')}}"></script>
@endsection
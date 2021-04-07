@extends('layouts/app')

@section('title','Review Pengadaan')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Review Pengadaan</h5>
				<div class="card card-custom none" id="pengadaan">
					<form id="form" class="card-body">
						<div class="form-group row">
							<label for="supplier_id" class="col-md-4 col-form-label">Supplier</label>
							<div class="col-md-8">
								<select class="custom-select" id="supplier_id" role="button">
									<option disabled selected>Pilih</option>
								</select>
								<div class="invalid-feedback" id="supplier_id-feedback"></div>
							</div>
						</div>
						<div class="form-group row align-items-center hide">
							<label class="col-md-4 col-form-label">Kontak Supplier</label>
							<div class="col-md-8">
								<div class="font-weight-bold" id="supplier_contact">-</div>
								<div id="supplier_contact-feedback" class="invalid-feedback"></div>
							</div>
						</div>
						<div class="form-group row hide">
							<label class="col-md-4 col-form-label">Link Supplier</label>
							<div class="col-md-8">
								<input class="form-control" type="url" id="url" placeholder="https://www.tokopedia.com/supplier">
								<div id="url-feedback" class="invalid-feedback"></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="ongkir" class="col-md-4 col-form-label">Ongkir</label>
							<div class="col-md-8">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
									</div>
									<input type="tel" class="form-control" id="ongkir">
									<div id="ongkir-feedback" class="invalid-feedback"></div>
								</div>
							</div>
						</div>
						<div id="data"></div>
						<div class="form-group" id="item">
							<div class="file-group mt-3">
								<div class="btn btn-md btn-block btn-outline-primary position-relative" id="add_item">
									<i class="position-absolute mdi mdi-plus mdi-18px" style="left:10px;top:5px"></i>Tambah Alker & Salker/Material
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" id="submit">
								<div class="loader loader-sm none" id="load">
									<svg class="circular" viewBox="25 25 50 50">
										<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
									</svg>
								</div>
								<span id="text">Review Pengadaan</span>
							</button>
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
	<script src="{{asset('api/create-pengadaan-review.js')}}"></script>
	<script src="{{asset('api/pengadaan/add-pengadaan-review.js')}}"></script>
@endsection
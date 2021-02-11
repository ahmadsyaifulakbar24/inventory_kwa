@extends('layouts/app')

@section('title','Approve Material')

@section('content')
	<div class="container">
		<h5 class="mb-3">Approve Material</h5>
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
							<div class="col-form-label font-weight-bold" id="kecamatan"></div>
						</div>
					</div>
					<div id="data"></div>
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
	<div class="modal fade" id="modal-approve" tabindex="-1" aria-hidden="true">
		<div class="modal modal-sm modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title">Approve Material</h5>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<div class="modal-body py-0">
					<form id="approve">
						<div class="form-group">
							<label class="col-form-label">Nama Supplier</label>
							<select class="custom-select" id="supplier_id"></select>
							<div id="supplier_id-feedback" class="invalid-feedback"></div>
						</div>
						<div class="form-group hide">
							<label class="col-form-label">Kontak Supplier</label>
							<div class="font-weight-bold" id="supplier_contact">-</div>
							<div id="supplier_contact-feedback" class="invalid-feedback"></div>
						</div>
						<div class="form-group hide">
							<label class="col-form-label">URL</label>
							<input class="form-control" id="url">
							<div id="url-feedback" class="invalid-feedback"></div>
						</div>
						<div class="form-group form-file">
							<label class="col-form-label">Foto</label>
							<div id="foto">
								<div class="mb-2" id="front">
									<div class="file-group file-front">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="front_picture" data-picture="front" role="button" accept=".png, .jpg, .jpeg">
											<label class="custom-file-label">Pilih Foto</label>
											<div id="image1-feedback" class="invalid-feedback"></div>
										</div>
									</div>
								</div>
								<div class="mb-2" id="back">
									<div class="file-group file-back">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="back_picture" data-picture="back" role="button" accept=".png, .jpg, .jpeg">
											<label class="custom-file-label">Pilih Foto</label>
											<div id="image2-feedback" class="invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group mb-0">
							<button class="btn btn-primary btn-block" id="submit">
								<div class="loader loader-sm none" id="load">
									<svg class="circular" viewBox="25 25 50 50">
										<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
									</svg>
								</div>
								<span id="text">Approve</span>
							</button>
						</div>
					</form>
				</div>
				<div class="modal-footer border-top-0">
					<div class="btn btn-sm btn-link" data-dismiss="modal">Batal</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/alker/add-file.js')}}"></script>
	<script src="{{asset('api/edit-approve-barang.js')}}"></script>
@endsection
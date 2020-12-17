@extends('layouts/app')

@section('title','Detail Alker')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Detail Alker</h5>
		<div id="data" class="hide">
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
			<hr>
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
						<label for="keterangan" class="col-lg-5 col-6 col-form-label text-secondary">Keterangan <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-keterangan">Edit</a></label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold keterangan"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-lg-5 col-6 col-form-label text-secondary">Status</label>
						<div class="col-lg-7 col-6">
							<div class="col-form-label font-weight-bold" id="status"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="front" class="col-lg-5 col-6 col-form-label text-secondary">Foto</label>
						<div class="col-lg-7 col-6">
							<label class="col-form-label text-capitalize pr-2" id="front">
								<a target="_blank" id="front_picture">Depan</a>
							</label>
							<label class="col-form-label text-capitalize" id="back">
								<a target="_blank" id="back_picture">Belakang</a>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<label for="qrcode" class="col-lg-5 col-6 col-form-label text-secondary">QR Code</label>
						<div class="col-lg-7 col-6 pt-2" id="qrcode"></div>
					</div>
				</div>
				<div class="col-xl-4">
					<hr class="d-block d-xl-none">
					<h5 class="mt-2">Status Alker</h5>
					<div id="history"></div>
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
	<div class="modal fade" id="modal-keterangan" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h6 class="modal-title text-capitalize">Edit Keterangan</h6>
					<div role="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal">
						<i class="mdi mdi-close mdi-18px pr-0"></i>
					</div>
				</div>
				<form id="edit">
					<div class="modal-body py-0">
						<div class="form-group mb-0">
							<!-- <label for="keterangan" class="col-form-label">Keterangan</label> -->
							<textarea class="form-control keterangan" id="keterangan" rows="3"></textarea>
						</div>
					</div>
					<div class="modal-footer border-top-0">
						<div class="btn btn-sm btn-link px-4" data-dismiss="modal" data-toggle="modal">Batal</div>
						<button class="btn btn-sm btn-primary px-4" id="btn-edit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>const kode_alker = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/detail-tool.js')}}"></script>
	<script src="{{asset('assets/vendors/qrcode/qrcode.min.js')}}"></script>
@endsection
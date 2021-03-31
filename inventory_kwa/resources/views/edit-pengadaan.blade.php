@extends('layouts/app')

@section('title','Edit Request Pengadaan')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-10 offset-xl-2 offset-lg-1">
				<h5 class="pb-2">Edit Request Pengadaan</h5>
				<div class="card card-custom none" id="pengadaan">
					<form id="form" class="card-body">
						<div class="form-group">
							<label for="jenis_pengadaan_id" class="col-form-label">Jenis Pengadaan</label>
							<select class="custom-select" id="jenis_pengadaan_id" role="button" disabled></select>
							<div class="invalid-feedback" id="jenis_pengadaan_id-feedback"></div>
						</div>
						<div id="data"></div>
						<div class="form-group hide" id="alker">
							<div class="file-group mt-3">
								<div class="btn btn-md btn-block btn-outline-primary position-relative" id="add_alker">
									<i class="position-absolute mdi mdi-plus mdi-18px" style="left:10px;top:5px"></i>Tambah Alker & Salker
								</div>
							</div>
						</div>
						<div class="form-group hide" id="item">
							<div class="file-group mt-3">
								<div class="btn btn-md btn-block btn-outline-primary position-relative" id="add_item">
									<i class="position-absolute mdi mdi-plus mdi-18px" style="left:10px;top:5px"></i>Tambah Material
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
								<span id="text">Simpan Request Pengadaan</span>
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
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/edit-pengadaan.js')}}"></script>
	<script src="{{asset('api/pengadaan/add-pengadaan-alker.js')}}"></script>
	<script src="{{asset('api/pengadaan/add-pengadaan-item.js')}}"></script>
@endsection
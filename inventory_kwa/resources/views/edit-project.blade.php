@extends('layouts/app')

@section('title','Edit Project')

@section('style')
	<style>input[type=number]{height:calc(1.5em + .75rem + 5px)}</style>
@endsection

@section('content')
	<div class="container">
		<h5 class="mb-3">Edit Project</h5>
		<form id="form" enctype="multipart/form-data" class="none">
			<div class="form-group row">
				<label for="project_name" class="col-xl-3 col-lg-4 col-md-5 col-form-label">Nama Site/Project</label>
				<div class="col-xl-5 col-lg-6 col-md-7">
					<input class="form-control" id="project_name" autofocus="autofocus">
					<div class="invalid-feedback" id="project_name-feedback">Masukkan nama site/project</div>
				</div>
			</div>
			<div class="form-group row mb-2 mb-md-3">
				<div class="col-xl-8 col-lg-10 col-12"><hr></div>
			</div>
			<div id="data"></div>
			<div class="form-group row">
				<div class="file-group mb-3 offset-xl-3 offset-lg-4 offset-md-5 col-xl-5 col-lg-6 col-md-7">
					<div class="btn btn-md btn-block btn-outline-primary position-relative" id="add-item">
						<i class="position-absolute mdi mdi-plus mdi-18px" style="left:10px;top:5px"></i>Tambah Barang
					</div>
				</div>
			</div>
			<div class="form-group row mt-5 mb-sm-5">
				<div class="offset-xl-3 offset-lg-4 offset-md-5 col-xl-5 col-lg-6 col-md-7">
					<button class="btn btn-primary btn-block" id="submit" disabled>
						<div class="loader loader-sm none" id="load">
							<svg class="circular" viewBox="25 25 50 50">
								<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
							</svg>
						</div>
						<span id="text">Simpan Project</span>
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
	<script>const id = '{{Request::route("id")}}'</script>
	<script src="{{asset('api/project/edit-item.js')}}"></script>
	<script src="{{asset('api/edit-project.js')}}"></script>
@endsection
@extends('layouts/app')

@section('title','Posisi Stok Alker')

@section('content')
	<div class="container">
		<h5 class="mb-3">Posisi Stok Alker <span class="text-secondary">(Di Gudang)</span></h5>
		<div id="data" class="row hide"></div>
		<div class="d-flex flex-column justify-content-center align-items-center state" id="loading">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10"/>
				</svg>
			</div>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-package-variant mdi-48px"></i>
			<h5>Belum ada barang</h5>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/stok-alker.js')}}"></script>
@endsection
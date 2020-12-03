@extends('layouts/app')

@section('title','Posisi Stok Material')

@section('content')
	<div class="container">
		<h5 class="mb-3">Posisi Stok Material</h5>
		<div id="data" class="hide">
			<h6 class="text-secondary">Kabel</h6>
			<div class="row pt-2 mb-3" id="Kabel"></div>
			<h6 class="text-secondary">ODP</h6>
			<div class="row pt-2 mb-3" id="ODP"></div>
			<h6 class="text-secondary">ODC</h6>
			<div class="row pt-2 mb-3" id="ODC"></div>
			<h6 class="text-secondary">OTB</h6>
			<div class="row pt-2 mb-3" id="OTB"></div>
			<h6 class="text-secondary">Pipa</h6>
			<div class="row pt-2 mb-3" id="Pipa"></div>
			<h6 class="text-secondary">Tiang</h6>
			<div class="row pt-2 mb-3" id="Tiang"></div>
		</div>
		<div class="loader state" id="loading">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="pathp" cx="50" cy="50" r="20" fill="none" stroke-width="6" stroke-miterlimit="1"/>
			</svg>
		</div>
		<div class="d-flex flex-column justify-content-center align-items-center state hide" id="empty">
			<i class="mdi mdi-package-variant mdi-48px"></i>
			<h5>Belum ada barang</h5>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('api/material.js')}}"></script>
@endsection
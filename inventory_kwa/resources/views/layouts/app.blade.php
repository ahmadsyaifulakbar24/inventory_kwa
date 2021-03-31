<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Inventory App</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
	@yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <div class="form-inline">
            <i class="mdi mdi-menu mdi-24px d-block d-lg-none pointer text-dark mr-2" id="menu"></i>
            <a class="navbar-brand d-none d-lg-block" href="{{url('dashboard')}}">
				<!-- <img src="{{asset('assets/images/eoffice.png')}}" width="30" class="d-inline-block align-top mr-2" alt="" loading="lazy"> -->
            	Inventory App
            </a>
        </div>
        <div class="dropdown ml-auto">
			@if(session("level"))
            <a id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	<img src="{{asset('assets/images/user.jpg')}}" class="avatar rounded-circle" width="25">
            </a>
            @endif
            <div class="dropdown-menu dropdown-menu-right rounded border-0" aria-labelledby="dropdownMenu">
            	<!-- <div class="text-center my-3 px-3 text-break">
	            	<img src="{{asset('assets/images/photo.png')}}" class="avatar rounded-circle" width="75">
	            	<h6 class="name text-truncate pt-3 mb-0"></h6>
	            	<small class="level text-secondary"></small>
	            </div> -->
            	<div class="dropdown-item d-flex align-items-center">
	            	<img src="{{asset('assets/images/user.jpg')}}" class="avatar rounded-circle align-self-center" width="50">
	            	<div class="ml-3 text-truncate">
		            	<h6 class="name text-truncate mb-1"></h6>
	            		@if(session("level") == 1) <div class="small text-secondary">Super Admin</div>
	            		@elseif(session("level") == 100) <div class="small text-secondary">Admin</div>
	            		@elseif(session("level") == 101) <div class="small text-secondary">Warehouse</div>
	            		@elseif(session("level") == 102) <div class="small text-secondary">Manager</div>
	            		@elseif(session("level") == 103) <div class="small text-secondary">Dirut Teknisi</div>
	            		@elseif(session("level") == 104) <div class="small text-secondary">Dirut</div>
	            		@endif
		            </div>
	            </div>
	            <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item {{Request::is('profil')?'active':''}}" href="{{url('profil')}}">
                    <i class="mdi mdi-18px mdi-account-box-outline"></i><span>Profil</span>
                </a>
                <a class="dropdown-item {{Request::is('ubah-password')?'active':''}}" href="{{url('ubah-password')}}">
                    <i class="mdi mdi-18px mdi-lock-outline"></i><span>Ubah Password</span>
                </a> -->
                <a class="dropdown-item" id="logout" role="button">
                    <i class="mdi mdi-18px mdi-login-variant"></i><span>Logout</span>
                </a>
            </div>
        </div>
    </nav>
	<div class="sidebar">
		<div class="py-2 pl-3 border-bottom">
			<!-- <img src="{{asset('assets/images/logo.png')}}" width="30" class="d-inline-block align-top mr-2 mt-1" alt="Logo" loading="lazy"> -->
			<span class="navbar-brand mb-0">Inventory App</span>
		</div>
		<small class="text-secondary text-uppercase font-weight-bold">Menu</small>
		<a href="{{url('dashboard')}}" class="{{Request::is('dashboard')?'active':''}}">
			<i class="mdi mdi-apps mdi-18px"></i><span>Dashboard</span>
		</a>
		<!-- <small class="text-secondary text-uppercase font-weight-bold">Menu</small>
		@if(session("level"))
		<a href="{{url('dashboard')}}" class="{{Request::is('dashboard')?'active':''}}">
			<i class="mdi mdi-apps mdi-18px"></i><span>Dashboard</span>
		</a>
		@endif -->
		@if(session("level") == "100" || session("level") == "103" || session("level") == "104")
		<a href="{{url('main-alker')}}" class="{{Request::is('main-alker')?'active':''}}">
			<i class="mdi mdi-package-variant-closed mdi-18px"></i><span>Daftar Alker & Salker</span>
		</a>
		@endif
		@if(session("level") == "100")
		<a href="{{url('material')}}" class="{{Request::is('material')?'active':''}}">
			<i class="mdi mdi-package-variant-closed mdi-18px"></i><span>Daftar Material</span>
		</a>
		<small class="text-secondary text-uppercase font-weight-bold">User</small>
		<a href="{{url('teknisi')}}" class="{{Request::is('teknisi')?'active':''}}">
			<i class="mdi mdi-account-circle-outline mdi-18px"></i><span>Daftar Teknisi</span>
		</a>
		<a href="{{url('supplier')}}" class="{{Request::is('supplier')?'active':''}}">
			<i class="mdi mdi-account-circle-outline mdi-18px"></i><span>Daftar Supplier</span>
		</a>
		@elseif(session("level") == "101")
		<a href="{{url('approve-alker')}}" class="{{Request::is('approve-alker')?'active':''}}">
			<i class="mdi mdi-check-circle-outline mdi-18px"></i><span>Approve Alker & Salker</span>
		</a>
		<a href="{{url('approve-barang')}}" class="{{Request::is('approve-barang')?'active':''}}">
			<i class="mdi mdi-check-circle-outline mdi-18px"></i><span>Approve Material</span>
		</a>
		@endif

		@if(session("level") == "102")
		<a href="{{url('alker')}}" class="{{Request::is('alker')?'active':''}}">
			<i class="mdi mdi-clipboard-text-outline mdi-18px"></i><span>Daftar Alker & Salker</span>
		</a>
		@endif
		@if(session("level") == "102" || session("level") == "103" || session("level") == "104")
		<a href="{{url('project')}}" class="{{Request::is('project')?'active':''}}">
			<i class="mdi mdi-clipboard-text-outline mdi-18px"></i><span>Daftar Project</span>
		</a>
		@endif

		@if(session("level") == "101" || session("level") == "102" || session("level") == "103" || session("level") == "104")
		<small class="text-secondary text-uppercase font-weight-bold">Pengadaan</small>
		@endif

		@if(session("level") == "102")
		<a href="{{url('pengadaan-request')}}" class="{{Request::is('pengadaan-request')?'active':''}}">
			<i class="mdi mdi-clipboard-plus-outline mdi-18px"></i><span>Pengadaan Request</span>
		</a>
		@endif

		@if(session("level") == "101" || session("level") == "103" || session("level") == "104")
		<a href="{{url('pengadaan-review')}}" class="{{Request::is('pengadaan-review')?'active':''}}">
			<i class="mdi mdi-clipboard-check-outline mdi-18px"></i><span>Pengadaan Review</span>
		</a>
		@endif

		@if(session("level"))
		<small class="text-secondary text-uppercase font-weight-bold">Posisi Stok</small>
		<a href="{{url('posisi-stok-alker')}}" class="{{Request::is('posisi-stok-alker')?'active':''}}">
			<i class="mdi mdi-package-variant-closed mdi-18px"></i><span>Posisi Stok Alker & Salker</span>
		</a>
		<a href="{{url('posisi-stok-material')}}" class="{{Request::is('posisi-stok-material')?'active':''}}">
			<i class="mdi mdi-package-variant-closed mdi-18px"></i><span>Posisi Stok Material</span>
		</a>
		@else
		<a href="{{url('/')}}">
			<i class="mdi mdi-login-variant mdi-18px"></i><span>Login</span>
		</a>
		@endif
		<small class="text-secondary" style="position:absolute;bottom:5px">2021 &copy; PT. Karl Wig Abadi</small>
	</div>
	<div class="overlay"></div>
	<div class="main">
		@yield('content')
	</div>
	<div class="customAlert"></div>

	@include('layouts.partials.script')
	<script>const id_user = '{{session("id")}}'</script>
	<script>const token = '{{session("token")}}'</script>
	<script>const level = '{{session("level")}}'</script>
	@if(session("level"))
	<script src="{{asset('api/session.js')}}"></script>
	@endif
	@yield('script')
</body>
</html>
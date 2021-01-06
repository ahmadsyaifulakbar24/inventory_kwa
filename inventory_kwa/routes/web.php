<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('session/login', [SessionController::class, 'createSession']);
Route::get('session/logout', [SessionController::class, 'deleteSession']);

Route::group(['middleware'=>['afterMiddleware']], function () {
	Route::get('/', function () {
		return view('login');
	});
});

Route::group(['middleware'=>['beforeMiddleware']], function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	});
	Route::get('material', function () {
		return view('material');
	});

	Route::group(['middleware'=>['adminMiddleware']], function () {
		Route::get('tool', function () {
			return view('tool');
		});
		Route::get('create/tool/{id}', function () {
			return view('create-tool');
		});
		Route::get('tool/{id}', function () {
			return view('view-tool');
		});
		Route::get('tool/detail/{id}', function () {
			return view('detail-tool');
		});
		
		Route::get('barang', function () {
			return view('barang');
		});
		Route::get('create/barang', function () {
			return view('create-barang');
		});
		Route::get('barang/{id}', function () {
			return view('edit-barang');
		});

		Route::get('teknisi', function () {
			return view('teknisi');
		});
		Route::get('create/teknisi', function () {
			return view('create-teknisi');
		});
		Route::get('teknisi/{id}', function () {
			return view('edit-teknisi');
		});
	});

	Route::group(['middleware'=>['direkturMiddleware']], function () {
		Route::get('approve-alker', function () {
			return view('approve-alker');
		});
		Route::get('approve-alker/{id}', function () {
			return view('edit-approve-alker');
		});

		Route::get('approve-barang', function () {
			return view('approve-barang');
		});
		Route::get('approve-barang/{id}', function () {
			return view('edit-approve-barang');
		});
	});

	Route::group(['middleware'=>['managerMiddleware']], function () {
		Route::get('alker', function () {
			return view('alker');
		});
		Route::get('alker/{id}', function () {
			return view('view-alker');
		});
		Route::get('create/alker', function () {
			return view('create-alker');
		});

		Route::get('project', function () {
			return view('project');
		});
		Route::get('create/project', function () {
			return view('create-project');
		});
		Route::get('project/{id}', function () {
			return view('edit-project');
		});
	});
});

Route::get('alker/detail/{id}', function () {
	return view('detail-alker');
});

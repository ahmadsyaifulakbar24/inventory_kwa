<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function createSession(Request $request) {
		$request->session()->put('id',$request->id);
		$request->session()->put('token',$request->token);
		$request->session()->put('level',$request->level);
	}

	public function deleteSession(Request $request) {
		$request->session()->forget('id');
		$request->session()->forget('token');
		$request->session()->forget('level');
	}
}
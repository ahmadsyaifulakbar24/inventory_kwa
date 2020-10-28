<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'username' => ['required'],
            'password' => ['required', 'string', 'min:8']
        ]);
        
        $token = app('auth')->attempt($request->only('username', 'password'));
        if($token) {
            $user = User::where('username', $request->user()->username)->first();
            return response()->json([
                'success' => true,
                'message' => 'login success',
                'data' => [
                    'user' => $user,
                    'api_token' => $token
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'login failed',
                'data' => ''
            ], 401);
        }
    }
}

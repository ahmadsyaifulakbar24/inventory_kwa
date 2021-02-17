<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class GetUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($user_id)
    {
        $user = User::find($user_id);
        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'user found',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'user not found',
                'data' => ''
            ], 401);
        }
    }
}

<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function __invoke()
    {
        auth()->logout();
        return response()->json([
            'success' => true,
            'message' => 'logout succeess'
        ]);
    }
}
=======
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function __invoke()
    {
        auth()->logout();
        return response()->json([
            'success' => true,
            'message' => 'logout succeess'
        ]);
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

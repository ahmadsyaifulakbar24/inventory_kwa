<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerPengadaanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    	$level = session()->get('level');
    	if($level == '102' || $level == '103' || $level == '104') {
	        return $next($request);
    	} else {
	        return redirect('dashboard');
    	}
    }
}

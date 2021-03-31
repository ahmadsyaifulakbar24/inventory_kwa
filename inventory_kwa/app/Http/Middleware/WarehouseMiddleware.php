<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WarehouseMiddleware
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
    	if($level == '101') {
	        return $next($request);
    	} else {
	        return redirect('dashboard');
    	}
    }
}

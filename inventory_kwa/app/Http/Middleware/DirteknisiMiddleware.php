<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirteknisiMiddleware
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
    	if($level == '103') {
	        return $next($request);
    	} else {
	        return redirect('dashboard');
    	}
    }
}

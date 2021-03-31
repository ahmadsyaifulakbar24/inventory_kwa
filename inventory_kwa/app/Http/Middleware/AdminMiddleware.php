<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
    	if($level == '100') {
	        return $next($request);
    	} else {
	        return redirect('dashboard');
    	}
    }
}

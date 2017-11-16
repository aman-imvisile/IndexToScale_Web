<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class SuperAdmin
{


	const SUPER_ADMIN='1'; 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    
    	if(Auth::check() && Auth::user()->user_type==self::SUPER_ADMIN){
        	return $next($request);
        }
        Session::flash('message', 'You are not authenticated to access this page!');  
        return back();
    }
}

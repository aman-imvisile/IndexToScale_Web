<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class AllAdmin
{

	const SUPER_ADMIN='1'; 
	const SIMPLE_ADMIN='2'; 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       	if(Auth::check() && ( Auth::user()->user_type==self::SUPER_ADMIN || Auth::user()->user_type==self::SIMPLE_ADMIN) ){
        	return $next($request);
        }
        Session::flash('message', 'You are not authenticated to access admin panel!');  
        return redirect('admin/login');
    }
}

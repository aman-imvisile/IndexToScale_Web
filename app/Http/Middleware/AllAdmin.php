<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class AllAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       	if(Auth::check() && ( Auth::user()->user_type=='1' || Auth::user()->user_type=='2') ){
        	return $next($request);
        }
        Session::flash('message', 'You are not authenticated to access admin panel!');  
        return redirect('admin/login');
    }
}

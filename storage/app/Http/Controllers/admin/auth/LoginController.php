<?php

namespace App\Http\Controllers\admin\auth;

use Auth;
use Validator;
use App\User;
use Hash;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  
  public function create()
  {  	
  	if(Auth::check() && Auth::user()->user_type=='1'){
  	return redirect('admin/dashboard');
  	}
  	 return view('admin.auth.login');
  }
  
  public function login(Request $request)
  {
  	  $email 	= $request->email; 
	  $password 	= $request->password;
	  $validator  = Validator::make($request->all(), [
		    'email' => 'email|required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
         return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }	
 
    if (Auth::attempt(['email' => $email, 'password' => $password])) {          
    		return redirect('admin/dashboard');    
     } 
       
      Session::flash('message', 'Credentials are not valid!');  		
      return redirect('admin/login');
  
  
    }
  
  
  public function logout(Request $request){
  
  	Auth::logout();
  	return redirect('admin/login');
  
  }
  
}

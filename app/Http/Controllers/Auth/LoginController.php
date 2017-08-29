<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


  public function login(Request $request)
  {
      $email    = $request->email; 
      $password     = $request->password;
      $validator  = Validator::make($request->all(),[
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
           return ['success'=>false, 'message'=>'validation error!','validator'=>$validator->errors()->all()]; 
        }   
 
    if (Auth::attempt(['email' => $email, 'password' => $password])) {   
        return ['success'=>true, 'validator'=>array('login succcessfully!')]; 
     }  
    return ['success'=>false, 'validator'=>array('Credentials are not valid!')]; 
  }
	
  
   public function logout(Request $request){
  
  	Auth::logout();
  	return redirect('/');
  
  }

	
	






}

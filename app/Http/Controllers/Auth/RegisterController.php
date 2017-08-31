<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\Thumbnail;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    	/**
	* To register newuser from frontend to databse
	*
	* @return Response
	*/
	public function registerUser(Request $request)
	{
		if(!empty($request->all()))
		{
			$validator = Validator::make($request->all(),[
											'username'			=> 'required',
    										'email'				=> 'required|email|unique:user_details',
    										'password'			=> 'required',    							
    										'confirm_password'	=> 'required|same:password',    									
    										'profile_image'		=> 'required|image|mimes:jpeg,bmp,png|max:2000'
    		]);
	   if ($validator->fails()) {
           return ['success'=>false, 'message'=>'validation error!','validator'=>$validator->errors()->all()]; 
        }   
 

			
   			$profile_image 	= $request->file('profile_image');
			$fileOriginalName= $profile_image->getClientOriginalName();
   			$filename = $profile_image->storeAs('public/profilepic',$fileOriginalName);   		
   			$filename=url('storage/app/'.$filename);
   				
   			Thumbnail::attachmentThumb(file_get_contents($profile_image), '200', '200', $fileOriginalName,'/app/public/profilepic/');   		 		
   			$thumbnail=url('storage/app/public/profilepic/thumb_'.$fileOriginalName);
   			
            $user=User::create([
								'username'		=> $request->username,
                				'email'			=> $request->email,
                				'password'		=> bcrypt($request->password),
                				'profile_image' => $filename,
                				'profile_thumbnail'=>$thumbnail,
                				'user_type'		=> '2', 
								'privileges'	=> '',
								'permission'	=> ''
            			]);
            
   			if(isset($user))
   			{
   					   if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {   
        					return ['success'=>true, 'message'=>'login succcessfully!']; 
     					}  
   				   
			}
		   return ['success'=>false, 'message'=>'some error occur!']; 	
		}
		
	}
    
    
    
}

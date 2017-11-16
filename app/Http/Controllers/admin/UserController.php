<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Models\User;
use App\Models\Property;
use App\Models\UserType;
use Auth;
use Mail;
use DB;
use App\Models\Thumbnail;
use GuzzleHttp\Client;

class UserController extends Controller
{	

   /**
	* To create newuser
	*
	* @return Response
	*/
    public function create()
    {
    	$userTypes=UserType::select('*')->get();
    	return view('admin.admin_users.adduser',array('userTypes'=>$userTypes));
    }
    
    
    
	/**
	* To save newuser's data to databse
	*
	* @return Response
	*/ 
	public function adduser(Request $request)
	{
		if(!empty($request->all()))
		{
			$validator = Validator::make($request->all(),[
											'fullname'			=> 'required|',
											'username'			=> 'required|',
    										'email'				=> 'required|email|unique:user_details',
    										'password'			=> 'required',    							
    										'confirm_password'	=> 'required|same:password',
											'user_type'			=> 'required|',
    										'privileges'		=> 'required',
    										'permission'		=> 'required',
    										'profile_image'		=> 'required|image|mimes:jpeg,bmp,png|max:2000'
    		]);
			if($validator->fails())
			{
    			return redirect('admin/user/create')->withErrors($validator)->withInput();
			}
			
   			$profile_image 	= $request->file('profile_image');
			$fileOriginalName= $profile_image->getClientOriginalName();
   			$filename = $profile_image->storeAs('public/profilepic',$fileOriginalName);   		
   			$filename=url('storage/app/'.$filename);
   				
   			Thumbnail::attachmentThumb(file_get_contents($profile_image), '200', '200', $fileOriginalName,'/app/public/profilepic/');   		 		
   			$thumbnail=url('storage/app/public/profilepic/thumb_'.$fileOriginalName);
   			
            $user=User::create([
								'fullname'		=> $request->fullname,
								'username'		=> $request->username,
                				'email'			=> $request->email,
                				'password'		=> bcrypt($request->password),
                				'profile_image' => $filename,
                				'profile_thumbnail'=>$thumbnail,
                				'user_type'		=> '2', 
								'privileges'	=> implode(',',$request->privileges),
								'permission'	=> implode(',',$request->permission)
            ]);
            
   			if(isset($user))
   			{
   				Session::flash('message', 'Record saved successfully!1');  		
				return redirect('admin/user/list');	
			}
		   Session::flash('message', 'some error occur!');
		   return redirect('admin/user/create');  		
		}
	}
	
	
	
	/**
	* Display a listing of all the users with user_type 2(Admin Users).
	*
	* @return Response
	*/
	public function userlist(Request $request,$user_type)
	{
	   	$users = User::select('*')->where('user_type',$user_type) ->orderBy('id', 'desc')->get();
		return view('admin.admin_users.userlist', array('users' =>$users));
	}
	
	
	
	/**
	* Display a listing of all the users with user_type 2(Admin Users).
	*
	* @return Response
	*/
	public function user_summary()
	{
	   	$users = User::select('*')->where('user_type',$user_type) ->orderBy('id', 'desc')->get();
		return view('admin.admin_users.user_summary', array('users' =>$users));
	}
	
	
	
	
	/**
	* Display user activity Details.
	*
	* @return Response
	*/
	public function useractivity(Request $request,$id)
	{
	   	$activity_Details = User::select('*')->where(['user_type' =>'2','id'=>$id])->first();
		return view('admin.admin_users.activity', compact('activity_Details'));
	}
	
	
	
	/**
	* To Alter table
	*
	* to delete admin user from database
	**/
	public function deleteUser(Request $request){
	
		$user = User::find($request->id);    
		$deleteUser = $user->delete();
		
   		if($deleteUser){
			Session::flash('message', "User deleted successfully!"); 
			Session::flash('alert-class', 'alert-success');
			return back();
	 	}
    }
    
    
    
    /**
	* To Alter table
	*
	* to delete admin user from database
	**/
    public function editUser(Request $request)
	{
		$id = $request->id;
	   	$user = User::select('*')->where('id','=', $id)->first();	   
	   	return view('admin.admin_users.edituser', array('user'=>$user));		
	}
	
	
	
	/**
	* To Alter table
	*
	* to Update admin user Details
	**/
	public function updateUser(Request $request)
	{
		if(!empty($request->all())){
		
			$validator = Validator::make($request->all(),[
											'fullname'			=> 'fullname|',
											'username'			=> 'required|',
    										'email'				=> 'required|email|unique:user_details',
    										'privileges'		=> 'required',
    										'permission'		=> 'required',
    		]);
    		
			if($validator->fails()){    		
				return redirect('admin/user/edit/'.$request->id)->withErrors($validator)->withInput();	
			}
			
			$profile_image 	= $request->file('profile_image');
			if(!empty($profile_image))
			{
				$fileOriginalName= $profile_image->getClientOriginalName();
   				$filename = $profile_image->storeAs('public/profilepic',$fileOriginalName);
   				$filename=url('storage/app/'.$filename);
   				Thumbnail::attachmentThumb(file_get_contents($profile_image), '200', '200', $fileOriginalName,'/app/public/profilepic/');   		 		
   			    $thumbnail=url('storage/app/public/profilepic/thumb_'.$fileOriginalName);
   				
   			}
   			
            $updateArray = [
							'fullname'		=> $request->fullname,
							'username'		=> $request->username,
                			'email'			=> $request->email,                			              			
							'privileges'	=> implode(',',$request->privileges),
							'permission'	=> implode(',',$request->permission)
			];
			if(!empty($profile_image)){
				
				$imageArray['profile_image']=$filename;
				$imageArray['profile_thumbnail']=$thumbnail;
				$updateArray=array_merge($updateArray, $imageArray);	
			}
			$user=User::findOrFail($request->id)->update($updateArray);
			
			if(isset($user)){
			
				Session::flash('message', "User updated successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/user/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/user/edit/'.$request->id);
		}
	}
	
	
	
	/**
	* To create newuser
	*
	* @return Response
	*/
    public function addnew_userType()
    {
    	return view('admin.admin_users.addusertype');
    }
    
    
    
	/**
	* To save new userType to databse
	*
	* @return Response
	*/
	public function savenew_userType(Request $request)
	{
		if(!empty($request->all()))
		{
			$validator = Validator::make($request->all(),[ 'usertype_name' => 'required' ]);
			
			if($validator->fails())
			{
    			return redirect('admin/userType/add')->withErrors($validator)->withInput();
			}
            
            $userType=UserType::create([
            		'usertype_name' => $request->usertype_name
            		]);
            
   			if(isset($userType))
   			{
   				Session::flash('message', 'Record saved successfully!');  		
				return redirect('admin/userType/list');	
			}
		   Session::flash('message', 'some error occur!');
		   return redirect('admin/userType/add');  		
		}
	}
	
	
	
	/**
	* To Edit newuser
	*
	* @return Response
	*/
    public function edit_userType(Request $request)
    {
    	$id = $request->id;
	   	$userType = UserType::select('*')->where('id','=', $id)->get();
	 
    	return view('admin.admin_users.editusertype',array('userType'=>$userType));
    }
	
	
	
	/**
	* To save new userType to databse
	*
	* @return Response
	*/
	public function update_userType(Request $request)
	{
		if(!empty($request->all()))
		{
			$validator = Validator::make($request->all(),[ 'usertype_name' => 'required' ]);
			
			if($validator->fails())
			{
    			return redirect('admin/UserType/edit/'.$request->id)->withErrors($validator)->withInput();
			}
						            
            $updateArray=[
            'usertype_name' => $request->usertype_name
            ];
            
            $userType=UserType::findOrFail($request->id)->update($updateArray);
   			if(isset($userType))
   			{
   				Session::flash('message', 'Record updated successfully!');  		
				return redirect('admin/userType/list');	
			}
		   Session::flash('message', 'some error occur!');
		   return redirect('admin/UserType/edit');  		
		}
	}
	
	
	
	/**
	* Display all userTypes
	*
	* @return Response
	*/
	public function userTypelist()
	{
	   	$usertype = UserType::select('*')->orderBy('id', 'desc')->get();
		return view('admin.admin_users.usertypelist', array('usertype' =>$usertype));
	}
	
	
	
	/**
	* To Alter table
	*
	* to delete admin user from database
	**/
	public function deleteUserType(Request $request){
	
		$userTye = UserType::find($request->id);    
		$deleteUserType = $userTye->delete();
		
   		if($deleteUserType){
			Session::flash('message', "User Type deleted successfully!"); 
			Session::flash('alert-class', 'alert-success');
			return back();
	 	}
    }
	        
    
    
    /**
	* To Alter table
	*
	* to delete admin user from database
	**/
    public function editAdmin(Request $request)
	{
		$id = $request->id;
	   	$users = User::select('*')->where('id', $id)->orderBy('id', 'desc')->first()->toArray();  
	   	return view('admin.userprofile', array('users'=>$users));		
	}
	
	
	
	/**
	* To Alter table
	*
	* to Update admin user Details
	**/
	public function updateAdmin(Request $request)
	{
		if(!empty($request->all())){
		
			$validator = Validator::make($request->all(),[
											'username'			=> 'required|',
    										'email'				=> 'required|email',
    										'password'			=> 'required',    							
    										'confirm_password'	=> 'required|same:password',
    										'profile_image'		=> 'required|image|mimes:jpeg,bmp,png|max:2000'
    		]);
			if($validator->fails()){    		
				return redirect('admin/profile/edit/'.$request->id)->withErrors($validator)->withInput();	
			}
			
			$profile_image 	= $request->file('profile_image');
			if(!empty($profile_image)){
				$fileOriginalName= $profile_image->getClientOriginalName();
   				$filename = $profile_image->storeAs('public/profilepic',$fileOriginalName);
   		        $filename=url('storage/app/'.$filename);
   				Thumbnail::attachmentThumb(file_get_contents($profile_image), '200', '200', $fileOriginalName,'/app/public/profilepic/');   		 		
   			    $thumbnail=url('storage/app/public/profilepic/thumb_'.$fileOriginalName);
   			}
   			
            $updateArray = [
								'username'		=> $request->username,
                				'email'			=> $request->email,
                				'password'		=> bcrypt($request->password)
                			
			];
				
				if(!empty($profile_image))
				{		
					$imageArray['profile_image']=$filename;
					$imageArray['profile_thumbnail']=$thumbnail;
					$updateArray=array_merge($updateArray, $imageArray);	
				}	
			
		
			$user=User::findOrFail($request->id)->update($updateArray);
				
			if(isset($user))
			{
				Session::flash('message', "User updated successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/profile/edit/'.$request->id);	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/profile/edit/'.$request->id);
		}
	}
}
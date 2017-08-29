<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use App\Models\Thumbnail;


class PropertyCategoryController extends Controller
{	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
	
		return view('admin.property_categories.addproperty_category');
	}
	

	/**
	 * add new property category
	 *
	 * @return Response
	 */
	public function addPropertyCategory(Request $request)
	{
		if(!empty($request->all())){
			$category_name 		= $request->category_name;
   			$category_image 	= $request->file('category_image');
   			$path='';

			$validator = Validator::make(
							['category_name'	=> 'required|'],
    						['category_image'	=> 'required']
			);
			
			if($validator->fails()) {
    			Session::flash('message', "Please fill the required field!"); 
				Session::flash('alert-class', 'alert-danger'); 
				return redirect()->back();//->withErrors($validator->errors());	
			}
			
			$ifemailExists = DB::table('its_property_categories')->where('category_name', $email) ->get();
			if(!empty($ifemailExists)){
				Session::flash('message', "This Category is already exist!"); 
				Session::flash('alert-class', 'alert-danger'); 
				return redirect()->back();//->withErrors($validator->errors());
			}	
   			if($profile_image){
    			$this->validate($request, [
        			'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    			]);
		 	 	$imagename= time().'.'.$category_image->getClientOriginalExtension();
		 		$input['imagename']=$imagename;
    			$destinationPath = public_path('uploads/profilepic/');
    			$path = url('/').'/public/uploads/property_category/'.$imagename;
   				$category_image->move($destinationPath, $input['imagename']);
   			}
			$last_id=DB::table('its_property_categories')->insertGetId(['category_name'=>$category_name,
														'category_image'=>$path
													]);
			$users = DB::table('its_property_categories')->where('id', $last_id)->get();
			//print_r($users);	
			Session::flash('message', "New Property Category Added successfully"); 
			Session::flash('alert-class', 'alert-success'); 
			return redirect('admin/property_categoryList');	
		}
	
	}
	

	/**
	 * show all property categories List
	 *
	 * @return Response
	 */
	public function property_categoryList()
	{
	   	$propertyCategoryList = PropertyCategory::select('*')->orderBy('id', 'desc')->get();
	   	return view('admin.property_categories.property_categorylist', compact('propertyCategoryList'));
	}
	
}

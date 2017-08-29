<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return view('admin.sub_categories.add_subcategory');
	}
	
	
	/**
	* Show the form to add new main_category
	*
	* @return Response
	*/
	public function add_sub_category(Request $request)
	{
		if(!empty($request->all())){

   			$validator = Validator::make($request->all(),
										[											
											'main_category_id'	=> 'required',						
											'category_name'		=> 'required',
    										'category_image'	=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    									]);
			if($validator->fails()){    		
				return redirect('admin/subcategory/create')->withErrors($validator)->withInput();	
			}
			
			$main_categoryImages = $request->file('category_image');			
			$file= $main_categoryImages->getClientOriginalName();
            $filename = $main_categoryImages->storeAs('public/main_category_images',$file);
            $imageurl=url('storage/app')."/".$filename;
			
			$maincategories=MainCategories::create([
										'main_category_id'			=>	$request->main_category_id, 
										'category_name'				=>	$request->category_name,  
										'category_image'			=>	$imageurl,
										'total_subscriptions_counts'	=> '0'
			]);
						
			if(isset($maincategories))
			{
				Session::flash('message', "New Main Category added successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/subcategory/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/subcategory/create');
		}
	}
	}

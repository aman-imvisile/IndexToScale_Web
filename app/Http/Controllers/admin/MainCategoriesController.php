<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MainCategories;
use App\Models\SubcategorySubscription;
use App\Http\Requests;
use Validator;
use App\Models\Thumbnail;
use Session;



class MainCategoriesController extends Controller
{
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return view('admin.main_categories.addmain_category');
	}
	
	
	
	/**
	* Show the form to add new main_category
	*
	* @return Response
	*/
	public function add_main_category(Request $request)
	{
		if(!empty($request->all())){
   			$validator = Validator::make($request->all(),[											
				'main_category_name'	=> 'required',
    			'main_category_image'	=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    		]);
			if($validator->fails()){    		
				return redirect('admin/movie/create')->withErrors($validator)->withInput();	
			}
			
			$main_categoryImages = $request->file('main_category_image');			
			$file= $main_categoryImages->getClientOriginalName();
            $filename = $main_categoryImages->storeAs('public/main_category_images',$file);
            $imageurl=url('storage/app')."/".$filename;
			
			$maincategories=MainCategories::create([
				'main_category_name'	=>	$request->main_category_name,  
				'main_category_image'	=>	$imageurl,
				'total_subscriptions'	=> '0'
			]);
						
			if(isset($maincategories)){
				Session::flash('message', "New Main Category added successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/maincategory/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/maincategory/create');
		}
	}
	
	
	
	/**
	 * to Display all Main Categories
	 *
	 * @return Response
	 */
	public function main_category_list()
	{
	   	$main_categories = MainCategories::select('*')->orderBy('id', 'desc')->get();
	   	return view('admin.main_categories.main_categorylist', compact('main_categories'));
	}
	
	
	
	/**
	 * to Display all Main Categories
	 *
	 * @return Response
	 */
	public function category_summary()
	{
	   	$categories = MainCategories::select('*')->orderBy('id', 'asc')->get();
	   	//echo "<pre/>";print_r($categories);
	   	return view('admin.main_categories.category_summary', compact('categories'));
	}
}
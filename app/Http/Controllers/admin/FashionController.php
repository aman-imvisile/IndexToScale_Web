<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fashion;
use App\Http\Requests;

class FashionController extends Controller
{	
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return view('admin.fashion.addfashion');
	}
	
	
	
	/**
	* add new fashion
	*
	* @return Response
	*/
	public function addfashion(Request $request)
	{
		if(!empty($request->all())){
			
   			$validator = Validator::make($request->all(),[											
				'title'	=> 'required',
    			'image'	=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    		]);
			if($validator->fails()){    		
				return redirect('admin/fashion/create')->withErrors($validator)->withInput();	
			}
			
			$fashionImages 	= $request->file('image');
			$filename = $image->store('fashion');
			$fashion=fashion::create([
				'title'	=>	$request->title,  
				'image'	=>	$filename
			]);
						
			if(isset($fashion)){
				Session::flash('message', "New Fashion added successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/fashion/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/fashion/create');
		}
	}
	
	
	
	/**
	 * to Display all fashions
	 *
	 * @return Response
	 */
	public function fashionlist()
	{
	   	$fashion = Fashion::select('*')->orderBy('id', 'desc')->get();
	   	return view('admin.fashion.fashionlist', compact('fashion'));
	}
}
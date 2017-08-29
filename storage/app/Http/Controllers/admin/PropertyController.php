<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyLinks;
use App\Models\PropertyImages;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Thumbnail;
use Validator;
use Session;

class PropertyController extends Controller
{
 	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$propertyCategories=SubCategory::select('*')->where('main_category_id','1')->get();
		return view('admin.property.addproperty',compact('propertyCategories'));
	}
	
		/**
	 * Show the form to add new propert
	 *
	 * @return Response
	 */
	public function addproperty(Request $request)
	{
		if(!empty($request->all())){
		
			$validator = Validator::make($request->all(),
											[											
											'address'				=> 'required',
    										'pincode'				=> 'required',
    										'area'					=> 'required',
    										'city'					=> 'required',
    										'country'				=> 'required',
    										'street_number'			=> 'required',
    										'street_name'		    => 'required',
    										'category'				=> 'required',
    										'property_name'			=> 'required',
    										'num_beds'				=> 'required|numeric',
    										'num_baths'				=> 'required|numeric',
    										'images'				=> 'required',
    										'floor_area_meters'		=> 'required|numeric',
    										'amenities'				=> 'required|numeric',
    										'transport'				=> 'required|numeric',
    										'approx_geo'     		=> 'required|numeric',    										
    										'neighbourhood'     	=> 'required|numeric',
    										'interior'				=> 'required|numeric',
    										'exterior'				=> 'required|numeric',
    										'privacy'				=> 'required|numeric',
    										'area_safety'			=> 'required|numeric',
    										'floor_area'			=> 'required|numeric',
    										'prestige'				=> 'required|numeric',
    										'lot'					=> 'required|numeric',
    										'views'					=> 'required|numeric',
    										'seaside'				=> 'required|numeric',
    										'riverside'				=> 'required|numeric',
    										'internet_speed'		=> 'required|numeric',
    										'url'              		=> 'required',
    										'main_title'            => 'required',
    										'small_title'           => 'required',
    										'icon_image'            => 'required'
			]);
			
			if($validator->fails()){    		
				return redirect('admin/property/create')->withErrors($validator)->withInput();	
			}
			
   			$i=0;
   			foreach ($request->images as $image){
   			
				if($i==0){
					        		
					$fileOriginalName= $image->getClientOriginalName();
   					$filename = $image->storeAs('public/property',$fileOriginalName);
            		$filename=url('storage/app/'.$filename);
            		Thumbnail::attachmentThumb(file_get_contents($image->getRealPath()), '200', '200', $fileOriginalName,'/app/public/property/');   		 		
   			    	$thumbnail=url('storage/app/public/property/thumb_'.$fileOriginalName);
   				
   				}
   				$i++;            	
        	}
			$property=Property::create([
										'address'			=>	$request->address, 
   										'pincode'			=>	$request->pincode, 
   										'latitude'			=>	$request->latitude,
   										'longitude'			=>	$request->longitude,
										'area'				=>	$request->area, 
										'city'				=>	$request->city, 
										'country'			=>	$request->country,														 
										'street_number'		=>	$request->street_number, 
										'street_name'		=>	$request->street_name,														
										'main_category_id'	=>	'1', 
										'sub_category_id'	=>	$request->category,
										'property_name'		=>	$request->property_name, 
										'num_beds'			=>	$request->num_beds, 
										'num_baths'			=>	$request->num_baths, 
										'image'				=>	$filename, 
										'image_thumbnail'	=>	$thumbnail, 
										'floor_area_meters' =>	$request->floor_area_meters, 
										'amenities'			=>	$request->amenities, 
										'transport'			=>	$request->transport,
										'approx_geo'		=>  $request->approx_geo,
										'neighbourhood'     =>  $request->neighbourhood,
										'interior'			=>	$request->interior, 
										'exterior'			=>	$request->exterior, 
										'privacy'			=>	$request->privacy, 
										'area_safety'		=>	$request->area_safety, 
										'floor_area'		=>	$request->floor_area, 
										'prestige'			=>	$request->prestige, 
										'lot'				=>	$request->lot, 
										'views'				=>	$request->views, 
										'seaside'			=>	$request->seaside, 
										'riverside'			=>	$request->riverside, 
										'internet_speed'	=>	$request->internet_speed														
														
			]);
													
			foreach ($request->images as $image){
            		           		
				$fileOriginalName= $image->getClientOriginalName();
   				$filename = $image->storeAs('public/property',$fileOriginalName);
            	$filename=url('storage/app/'.$filename);
            		    
            	Thumbnail::attachmentThumb(file_get_contents($image->getRealPath()), '200', '200', $fileOriginalName,'/app/public/property/');   		 		
   			    $thumbnail=url('storage/app/public/property/thumb_'.$fileOriginalName);
   			    		
           		PropertyImages::create([
                		'property_id'		=> $property->id,
                		'image'				=> $filename,
                		'image_thumbnail'	=>	$thumbnail                		
            	]);
        	}
        		
        	$url	=	$request->url;
			$main_title=	$request->main_title;
			$small_title	=	$request->small_title;
			$icon_image	=	$request->icon_image;

            for($i=0; $i< count($url); $i++){
            
				$fileOriginalName= $icon_image[$i]->getClientOriginalName();
   				$filename = $icon_image[$i]->storeAs('public/extra_links',$fileOriginalName);
            	$filename=url('storage/app/'.$filename);
            		   		
              	Thumbnail::attachmentThumb(file_get_contents($icon_image[$i]->getRealPath()), '200', '200', $fileOriginalName,'/app/public/extra_links/');   		 		
   			    $thumbnail=url('storage/app/public/extra_links/thumb_'.$fileOriginalName);
   			    $data = [ 
                        'property_id'	=> $property->id,
                        'url'			=> $url[$i],
                        'main_title'	=> $main_title[$i], // see above for why this might be a bad idea
                        'small_title'	=> $small_title[$i], // see above for why this might be a bad idea
                        'icon_image'	=> $filename ,
                        'icon_image_thumbnail' => $thumbnail                           		
  				];

  			   PropertyLinks::create($data);
			}
        		
        	if(isset($property)){
        	
				Session::flash('message', "New property added successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/property/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/property/create');
		}
	}
	
	
	/**
	 * to Display all properties
	 *
	 * @return Response
	 */
	public function propertylist(Request $request,$catid,$subcatid)
	{
	   	$properties = Property::with('PropertyImages')->where(['main_category_id'=>$catid,'sub_category_id'=>$subcatid])->get();	
	   	return view('admin.property.propertylist', compact('properties'));	
	}
	
	
	public function edit(Request $request)
	{
	   	$property = Property::with('PropertyImages')->with('PropertyLinks')->where('id','=',$request->id)->get()->toArray();	
	   	$propertyCategories=SubCategory::select('*')->where('main_category_id','1')->get();
	   	return view('admin.property.editProperty', array('property'=>$property,'propertyCategories'=>$propertyCategories));		
	}
	
	public function delete(Request $request)
	{
	 	$deleteProperty=Property::find($request->id)->delete();
	 	
	 	if($deleteProperty){
	 		Session::flash('message', "Property deleted successfully!"); 
			Session::flash('alert-class', 'alert-success');
	 		return back();
	 	}
	}
	
	public function update(Request $request)
	{
		if(!empty($request->all())){
   			 		
   			$validator = Validator::make($request->all(),[											
											'address'				=> 'required',
    										'pincode'				=> 'required',
    										'area'					=> 'required',
    										'city'					=> 'required',
    										'country'				=> 'required',
    										'street_number'			=> 'required', 
											'street_name'			=> 'required',
    										'category'				=> 'required',
    										'property_name'			=> 'required',
    										'num_beds'				=> 'required|numeric',
    										'num_baths'				=> 'required|numeric',    								
    										'floor_area_meters'		=> 'required|numeric',
    										'amenities'				=> 'required|numeric',
    										'transport'				=> 'required|numeric',
    										'approx_geo'     		=> 'required|numeric',    										
    										'neighbourhood'     	=> 'required|numeric',
    										'interior'				=> 'required|numeric',
    										'exterior'				=> 'required|numeric',
    										'privacy'				=> 'required|numeric',
    										'area_safety'			=> 'required|numeric',
    										'floor_area'			=> 'required|numeric',
    										'prestige'				=> 'required|numeric',
    										'lot'					=> 'required|numeric',
    										'views'					=> 'required|numeric',
    										'seaside'				=> 'required|numeric',
    										'riverside'				=> 'required|numeric',
    										'internet_speed'		=> 'required|numeric'
    		]);
    		
			if($validator->fails()){    		
				return redirect('admin/property/edit/'.$request->id)->withErrors($validator)->withInput();	
			}
			
			if(!empty($request->images)){	
			
				$i=0;
   				foreach ($request->images as $image){
   				
					if($i==0){
					
						$fileOriginalName= $image->getClientOriginalName();
   						$filename = $image->storeAs('public/property',$fileOriginalName);
            		    $filaename=url('storage/app/').$filename;            		 
   			    		Thumbnail::attachmentThumb(file_get_contents($image->getRealPath()), '200', '200', $fileOriginalName,'/app/public/property/');   		 		
   			    		$thumbnail=url('storage/app/public/property/thumb_'.$fileOriginalName);
   			    	}
   					$i++;
            	
        		}
        	}
      
			$updateArray = [				
						    'address'			=>	$request->address, 
   							'pincode'			=>	$request->pincode, 
   							'latitude'			=>  $request->latitude,
   							'longitude'			=>  $request->longitude,
   							'street_number'		=>	$request->street_number, 
							'street_name'		=>	$request->street_name,
							'area'				=>	$request->area, 
							'city'				=>	$request->city, 
							'country'			=>	$request->country, 
							'category'			=>	$request->category, 
							'property_name'		=>	$request->property_name, 
							'num_beds'			=>	$request->num_beds, 
							'num_baths'			=>	$request->num_baths, 													
							'floor_area_meters' =>	$request->floor_area_meters, 
							'amenities'			=>	$request->amenities, 
							'transport'			=>	$request->transport,
							'approx_geo'		=>  $request->approx_geo,
							'neighbourhood'     =>  $request->neighbourhood,
							'interior'			=>	$request->interior, 
							'exterior'			=>	$request->exterior, 
							'privacy'			=>	$request->privacy, 
							'area_safety'		=>	$request->area_safety, 
							'floor_area'		=>	$request->floor_area, 
							'prestige'			=>	$request->prestige, 
							'lot'				=>	$request->lot, 
							'views'				=>	$request->views, 
							'seaside'			=>	$request->seaside, 
							'riverside'			=>	$request->riverside, 
							'internet_speed'	=>	$request->internet_speed
			];
				
			if(!empty($request->images)){
			
				$imageArray['image']=$filename;
				$imageArray['image_thumbnail']=$thumbnail;
				$updateArray=array_merge($updateArray, $imageArray);	
			}	
				
			$property=Property::findOrFail($request->id)->update($updateArray);
													
			if(!empty($request->images)){
				
				$DeleteOldImages=PropertyImages::where('property_id',$request->id)->delete();			
				
				foreach ($request->images as $image){
            		           		
					$fileOriginalName= $image->getClientOriginalName();
   					$filename = $image->storeAs('public/property',$fileOriginalName);
            		$filaename=url('storage/app/'.$filename);
            		Thumbnail::attachmentThumb(file_get_contents($image->getRealPath()), '200', '200', $fileOriginalName,'/app/public/property/');   		 		
   			    	$thumbnail=url('storage/app/public/property/thumb_'.$fileOriginalName);
           			PropertyImages::create([
                			'property_id' => $request->id,
                			'image' => $filename,
                			'image_thumbnail'=>$thumbnail
            		]);
            	}			
        	}		
        	$url =	$request->url;
			$main_title =	$request->main_title;
			$small_title =	$request->small_title;
			$icon_image	=	$request->icon_image;
			$linkId = $request->linkId;
			//get all property link data related to particular  property
			$propertyLinkArray=PropertyLinks::select('id')->where('property_id',$request->id)->get()->toArray();
					
			$array = array_column($propertyLinkArray, 'id');
			// make indexed array 					 					
			$IndexArray=array_values($array);
			// Find different values from both array
			$result=array_diff($IndexArray,$linkId);
			
			if(!empty($result)){					
				$deletelinks= PropertyLinks::whereIn('id', $result)->delete();
			}
            for($i=0; $i< count($url); $i++){
            	
              	if(isset($linkId[$i]) && !empty($linkId[$i])){
              	
              		if(!empty($icon_image[$i])){
              		
              			$fileOriginalName= $icon_image[$i]->getClientOriginalName();
   						$filename = $icon_image[$i]->storeAs('public/extra_links',$fileOriginalName);
            		   	$filename=url('storage/app/'.$filename);            		   		
   			    		Thumbnail::attachmentThumb(file_get_contents($icon_image[$i]->getRealPath()), '200', '200', $fileOriginalName,'/app/public/extra_links/');   		 		
   			    		$thumbnail=url('storage/app/public/extra_links/thumb_'.$fileOriginalName);            		   			
            		   	$data = [ 
                            	'property_id'	=> $request->id,
                            	'url'			=> $url[$i],
                           		'main_title'	=> $main_title[$i], 
                           		'small_title'	=> $small_title[$i], 
                            	'icon_image'	=> $filename,
                            	'icon_image_thumbnail'=> $thumbnail                        		
  						];
              		}else{
              			$data = [ 
                            	 'property_id'	=> $request->id,
                            	 'url'			=> $url[$i],
                           		 'main_title'	=> $main_title[$i], 
                           		 'small_title'	=> $small_title[$i]
  						];              				
              		}              				
  					PropertyLinks::where('id',$linkId[$i])->update($data);  						   
  				}else{
              		$fileOriginalName= $icon_image[$i]->getClientOriginalName();
   					$filename = $icon_image[$i]->storeAs('public/extra_links',$fileOriginalName);
            		$filename=url('storage/app/'.$filename);            		   	
            		Thumbnail::attachmentThumb(file_get_contents($icon_image[$i]->getRealPath()), '200', '200', $fileOriginalName,'/app/public/extra_links/');   		 		
   			    	$thumbnail=url('storage/app/public/extra_links/thumb_'.$fileOriginalName);  
   			    			
              		$data = [ 
                            	 'property_id'	=> $request->property_id,
                            	 'url'			=> $url[$i],
                           		 'main_title'	=> $main_title[$i], 
                           		 'small_title'	=> $small_title[$i],
                           		 'icon_image'	=> $filename ,
                           		 'icon_image_thumbnail'=> $thumbnail
  					];
              		PropertyLinks::create($data);
              	}
            }
        	 		
			if(isset($property))
			{
				Session::flash('message', "Property updated successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/property/list');	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/property/edit/'.$request->id);
		}
	}
}
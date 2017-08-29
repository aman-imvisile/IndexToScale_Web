<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainCategories;
use App\Models\MainCategorySubscription;
use App\Models\MainCategorySubscriptionLog;
use App\Models\SubCategory;
use App\Models\SubcategorySubscription;
use App\Models\SubcategorySubscriptionLogs;
use App\Models\Property;
use App\Models\PropertyImages;
use Auth;
use Route;

class PropertyController extends Controller
{
    
    public function index($catid)
    {              
        $MainCategory=MainCategories::select('*')->where('id',$catid)->first();
        $SubCategories=SubCategory::select('*')->where('main_category_id',$catid)->get(); 

        $maxSubCount=SubCategory::max('total_subscriptions_counts');
        $subscriptionMaxCount=SubCategory::all()->where('total_subscriptions_counts',$maxSubCount)->first(); 
        if(Auth::check())
        {    
            $user_id= Auth::user()->id;
            foreach($SubCategories as $key=>$value)
            {
                $subscribeSubCategories=SubcategorySubscription::select('*')->where(['subcategory_id'=>$value['id'],'user_id'=>$user_id])->first();
                $SubCategories[$key]['subscription_status_type']=$subscribeSubCategories['status_type'];
            }
        }

        // echo"<pre>";print_r($SubCategories)->toArray();echo"</pre>";
        // exit();

    	return view('frontend.property.propertyCategory',compact('SubCategories','subscriptionMaxCount','MainCategory'));   
    }


    public function subscribeSubCategory(Request $request)
    {    
    		
         $sub_category_id = $request->sub_category_id;
         $main_category_id = $request->main_category_id;
       
        if(Auth::check())
        {
            $user_id=Auth::user()->id;
            
            $SubCategorySubs=SubcategorySubscription::select('*')->where(['user_id'=>$user_id,'subcategory_id'=>$sub_category_id])->first();
            if(isset($SubCategorySubs) && !empty($SubCategorySubs))
            {
                
                $status_type= $SubCategorySubs->status_type;
                
                if($status_type=='1')
                {
                    $update_status_type='0';
                    $mainCatSubsLogdata['enddate']= date('Y-m-d H:i:s');
                    $subCatSubsLogdata['enddate']= date('Y-m-d H:i:s');
                 
                    //Subcategory decrement 
                     $subCatSubCount=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first();
                      if($subCatSubCount->total_subscriptions_counts!='0')
                      {
                        SubCategory::where('id',$sub_category_id)->decrement('total_subscriptions_counts');
                      }
                }
                else
                {
                    $update_status_type='1';
                    $mainCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
                    $subCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
                    $mainCatSubsLogdata['enddate']='';
                    $subCatSubsLogdata['enddate']= '';
                      //Subcategory increment 
                    SubCategory::where('id',$sub_category_id)->increment('total_subscriptions_counts');
                }
             
               //Subcategory subcription                
                $updateSubcatSub=SubcategorySubscription::where(['user_id'=>$user_id,'subcategory_id'=>$sub_category_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_status_type]); 
                  
                //Subcategory subcription log                
                            
                $updateSubCatSubsLog=SubcategorySubscriptionLogs::where(['main_category_id'=>$main_category_id,'subcategory_id'=>$sub_category_id,'user_id'=>$user_id])->update($subCatSubsLogdata);

               
				//Main category updation
                $checkMainCategorySub=SubcategorySubscription::select('status_type')->where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->get();    
            
                foreach ($checkMainCategorySub as $h) 
                {

                    $cids[] = $h['status_type'];
               
                }
                $counts = array_count_values($cids);
              	// print_r($counts);
                if(!empty($counts)) 
                {
                if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type=='1' )
                {
                	$update_main_status_type='1';
                }
                
                 if(empty($counts[0]) && !empty($counts[1] && $update_status_type=='1' ))
                {
                	$update_main_status_type='1';
                }                
                if(!empty($counts[0]) && empty($counts[1]) && $update_status_type=='0')
                {
                	$update_main_status_type='0';
                }
    			 if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type=='0')
                {
                	$update_main_status_type='0';
                }
                
    			$MainCategorySubsStatus=MainCategorySubscription::select('status_type')->where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->first();
    			 
    			if(!empty($counts[0]) && empty($counts[1]) && $update_status_type=='0')
    			 {           
				   $update=MainCategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_main_status_type]);
				   	//main category subcription log             
                	$updateMainCatSubsLog=MainCategorySubscriptionLog::where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($mainCatSubsLogdata); 
				 }
				 if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type=='1' )
				 {
				   $update=MainCategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_main_status_type]);
				   	//main category subcription log  
                	 $updateMainCatSubsLog=MainCategorySubscriptionLog::where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($mainCatSubsLogdata); 
				 }
				 
				 if($update_main_status_type=='0')
				 {
							$mainSubCount=MainCategories::select('total_subscriptions')->where('id',$main_category_id)->first();
                    		if($mainSubCount->total_subscriptions!='0')
                    		{
				 				MainCategories::where('id',$main_category_id)->decrement('total_subscriptions');	
				 			}
				 }
				 else if($update_status_type=='1')				 		 
				 {
				 	MainCategories::where('id',$main_category_id)->increment('total_subscriptions');	
				 }
				 	
					
                
                } 
				
				
				///Return result
                if(isset($updateSubCatSubsLog))
                {             
                    $totalSubscription=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first()->toArray();
                    return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>'subscription Updated!'];     
                }
             }           
               else          
             {             

              //main category Subscription  create for first time
               $mainSubdata['main_category_id']=$main_category_id;
               $mainSubdata['user_id']=$user_id;
               $mainSubdata['status_type']='1';            
               $createSubcription=MainCategorySubscription::create($mainSubdata);       
               
               //main category Subscription log 
               $mainCatSubsLogdata['main_category_id']=$main_category_id;  
               $mainCatSubsLogdata['user_id']=$user_id;   
               $mainCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
               $createMainCatSubsLog=MainCategorySubscriptionLog::create($mainCatSubsLogdata);  

               //Increment value of total_subscription of main category
                MainCategories::where('id',$main_category_id)->increment('total_subscriptions');
                SubCategory::where('id',$sub_category_id)->increment('total_subscriptions_counts');

               //Sub category Subscription   create for first time
               $subCatSubsdata['main_category_id']=$main_category_id;
               $subCatSubsdata['user_id']=$user_id;
               $subCatSubsdata['subcategory_id']=$sub_category_id;               
               $subCatSubsdata['status_type']='1';              
               $createSubCatSubcription=SubcategorySubscription::create($subCatSubsdata);       
               
               //Sub category Subscription log 
               $subCatSubsdatalogs['main_category_id']=$main_category_id;  
               $subCatSubsdatalogs['user_id']=$user_id;   
               $subCatSubsdatalogs['subcategory_id']=$sub_category_id; 
               $subCatSubsdatalogs['start_date']=date('Y-m-d H:i:s');
               $createSubCatSubsLog=SubcategorySubscriptionLogs::create($subCatSubsdatalogs);

               if(isset($createSubCatSubcription))
               {              
                    $totalSubscription=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first()->toArray();
                    return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>'subscription Created!'];   
               }
               
            }
              
        }       
         else
        {
          
          return ['success'=>false, 'message'=>'you are not authenticated!'];
        }             
                
    }


    public function propoertylist(Request $request)
    {    	
   		$categories['main_cat_id'] = $request->catid;
   	    $categories['sub_cat_id'] = $request->subcatid;   		
    	
    	$properties=Property::with('PropertyImages')->with('PropertyLinks')->where(['main_category_id'=>$request->catid,'sub_category_id'=>$request->subcatid])->orderby('id','desc')->get();
    	
    	return view('frontend.property.propertylist',compact('properties','categories'));   	
    }
    
    
    public function viewSingleProperty(Request $request)
    {
    	$property_id= $request->property_id;    		
		$property=Property::with('PropertyImages')->with('PropertyLinks')->where('id',$property_id)->first();
		
		if(!empty($property))
		{
			return ['success'=>true,'data'=>$property, 'message'=>'data fetched!'];
		}
		
    	return ['success'=>false,'message'=>'some problem occur!'];
    }
    
    public function propertyFilter(Request $request)
    {
    	$filters=$request->all();    	    
    
    	$properties=Property::with('PropertyImages')->with('PropertyLinks')->where(
    	function($query) use($filters) {
      			if(isset($filters['to_let']))
      			{
    	  		 $query->where('purpose',$filters['to_let']);
    	  		}
    			if(isset($filters['for_sale']))
      			{
    	  		 $query->orWhere('purpose',$filters['for_sale']);
    	  		}
    	  		if(isset($filters['short_let']))
      			{
    	  		 $query->orWhere('purpose',$filters['short_let']);
    	  		}
        	

    	    })->where(['main_category_id'=>$filters['main_cat_id'],'sub_category_id'=>$filters['sub_cat_id']])->orderby('id','desc')->get();

       if(isset($properties) && !empty($properties)) 
       {	
  	    return ['success'=>true, 'data'=>$properties];
  	   }
      	return ['success'=>false, 'data'=>'no record found!'];
    	
    	
    	
    }
    
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    
    const ERROR_MESSAGE ='No data available.';
    const SUCCESS_MESSAGE ='Record found.';
    const NO_AUTH_MESSAGE ='You are not authenticated.';
    const SUBS_CREATED_SUCCESS_MESSAGE ='Subscription created successfully.';
    const SUBS_UPDATED_SUCCESS_MESSAGE ='Subscription updated successfully.';
    const STATUS_ONE='1';      //To set the status=1 of the field into database
    const STATUS_ZERO='0';	   //To set the status=0 of the field into database

    /*
    |--------------------------------------------------------------------------
    | Index Method
    |--------------------------------------------------------------------------
    |
    |  
    |
  */
    
    public function index($catid)
    {   
    
    	Log::info('listing sucategories of main category', ['catid' => $catid]);	   
    	        
        $MainCategory=MainCategories::select('*')->where('id',$catid)->first();
        $SubCategories=SubCategory::select('*')->where('main_category_id',$catid)->get(); 

        $maxSubCount=SubCategory::max('total_subscriptions_counts');
        $subscriptionMaxCount=SubCategory::all()->where('total_subscriptions_counts',$maxSubCount)->first(); 
        if(Auth::check()){    
            $user_id= Auth::user()->id;
            foreach($SubCategories as $key=>$value){
                $subscribeSubCategories=SubcategorySubscription::select('*')->where(['subcategory_id'=>$value['id'],'user_id'=>$user_id])->first();
                $SubCategories[$key]['subscription_status_type']=$subscribeSubCategories['status_type'];
            }
        }

    	return view('frontend.property.propertyCategory',compact('SubCategories','subscriptionMaxCount','MainCategory','catid'));   
    }

	  /*
    |--------------------------------------------------------------------------
    | Short number format
    |--------------------------------------------------------------------------
    |
    |  
    |
  */
    public function number_format_short($n,$precision = 1) {

	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;

    } 
    
	
	/*
    |--------------------------------------------------------------------------
    | subscribeSubCategory Method
    |--------------------------------------------------------------------------
    |
    |  
    |
  */
    public function subscribeSubCategory(Request $request)
    {    
    	 Log::info('sucategories subscription', ['subcategory_id' => $request->sub_category_id] );		
         $sub_category_id = $request->sub_category_id;
         $main_category_id = $request->main_category_id;
       
        if(Auth::check()){
            $user_id=Auth::user()->id;
            
            $SubCategorySubs=SubcategorySubscription::select('*')->where(['user_id'=>$user_id,'subcategory_id'=>$sub_category_id])->first();
            if(isset($SubCategorySubs) && !empty($SubCategorySubs)){
                
                $status_type= $SubCategorySubs->status_type;
                
                if($status_type==self::STATUS_ONE){
                    $update_status_type=self::STATUS_ZERO;
                    $mainCatSubsLogdata['enddate']= date('Y-m-d H:i:s');
                    $subCatSubsLogdata['enddate']= date('Y-m-d H:i:s');
                 
                    //Subcategory decrement 
                     $subCatSubCount=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first();
                     //If the sub categrory total soscription not equal 0 then it will decrement the total subscriptions
                      if($subCatSubCount->total_subscriptions_counts!=self::STATUS_ZERO){                        
                        SubCategory::where('id',$sub_category_id)->decrement('total_subscriptions_counts');
                      }
                }else{
                    $update_status_type=self::STATUS_ONE;
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
            
                foreach ($checkMainCategorySub as $h){
                    $cids[] = $h['status_type'];
                }
                $counts = array_count_values($cids);
              	
                if(!empty($counts)){
                
                if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type==self::STATUS_ONE ){                
                	$update_main_status_type=self::STATUS_ONE;
                }
                
                 if(empty($counts[0]) && !empty($counts[1] && $update_status_type==self::STATUS_ONE )){
                   $update_main_status_type=self::STATUS_ONE;
                }                
                if(!empty($counts[0]) && empty($counts[1]) && $update_status_type==self::STATUS_ZERO){
                	$update_main_status_type=self::STATUS_ZERO;
                }
    			 if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type==self::STATUS_ZERO){
                	$update_main_status_type=self::STATUS_ZERO;
                }
                
    			$MainCategorySubsStatus=MainCategorySubscription::select('status_type')->where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->first();
    			 
    			if(!empty($counts[0]) && empty($counts[1]) && $update_status_type==self::STATUS_ZERO){           
				   $update=MainCategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_main_status_type]);
				   	//main category subcription log             
                	$updateMainCatSubsLog=MainCategorySubscriptionLog::where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($mainCatSubsLogdata); 
				 }
				 if(!empty($counts[0]) && !empty($counts[1]) && $update_status_type==self::STATUS_ONE ){
				   $update=MainCategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_main_status_type]);
				   	//main category subcription log  
                	 $updateMainCatSubsLog=MainCategorySubscriptionLog::where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($mainCatSubsLogdata); 
				 }
				 
				 if($update_main_status_type==self::STATUS_ZERO){
							$mainSubCount=MainCategories::select('total_subscriptions')->where('id',$main_category_id)->first();
							//If the main categrory total soscription not equal 0 then it will decrement the total subscriptions
                    		if($mainSubCount->total_subscriptions!=self::STATUS_ZERO){
				 				MainCategories::where('id',$main_category_id)->decrement('total_subscriptions');	
				 			}
				 }
				 else if($update_status_type==self::STATUS_ONE){
				 	MainCategories::where('id',$main_category_id)->increment('total_subscriptions');	
				  }
				 	
                } 
				
				///Return result
                if(isset($updateSubCatSubsLog))
                {             
                    $totalSubscription=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first()->toArray();
                    return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>self::SUBS_UPDATED_SUCCESS_MESSAGE];     
                }
             }           
               else {
              //main category Subscription  create for first time
               $mainSubdata['main_category_id']=$main_category_id;
               $mainSubdata['user_id']=$user_id;
               $mainSubdata['status_type']=self::STATUS_ONE;            
               $createSubcription=MainCategorySubscription::create($mainSubdata);       
               
               //main category Subscription log 
               $mainCatSubsLogdata['main_category_id']=$main_category_id;  
               $mainCatSubsLogdata['user_id']=$user_id;   
               $mainCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
               $createMainCatSubsLog=MainCategorySubscriptionLog::create($mainCatSubsLogdata);  

               //Increment value of total_subscription of main category
                MainCategories::where('id',$main_category_id)->increment('total_subscriptions');
                SubCategory::where('id',$sub_category_id)->increment('total_subscriptions_counts');

               //Sub category Subscription create for first time
               $subCatSubsdata['main_category_id']=$main_category_id;
               $subCatSubsdata['user_id']=$user_id;
               $subCatSubsdata['subcategory_id']=$sub_category_id;               
               $subCatSubsdata['status_type']=self::STATUS_ONE;              
               $createSubCatSubcription=SubcategorySubscription::create($subCatSubsdata);       
               
               //Sub category Subscription log 
               $subCatSubsdatalogs['main_category_id']=$main_category_id;  
               $subCatSubsdatalogs['user_id']=$user_id;   
               $subCatSubsdatalogs['subcategory_id']=$sub_category_id; 
               $subCatSubsdatalogs['start_date']=date('Y-m-d H:i:s');
               $createSubCatSubsLog=SubcategorySubscriptionLogs::create($subCatSubsdatalogs);

               if(isset($createSubCatSubcription)) {              
                    $totalSubscription=SubCategory::select('total_subscriptions_counts')->where('id',$sub_category_id)->first()->toArray();
                    return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>self::SUBS_CREATED_SUCCESS_MESSAGE];   
               }
               
            }
              
        } else{          
          return ['success'=>false, 'message'=>self::NO_AUTH_MESSAGE];
        }             
                
    }
	/*
    |--------------------------------------------------------------------------
    | propoertylist Method
    |--------------------------------------------------------------------------
    |
    |  
    |
  */
    public function propertyList(Request $request)
    {    	
    	Log::info('All property listing of related category and subcategory.', ['main_category_id'=>$request->catid ,'subcategory_id' => $request->subcatid] );	
   		$categories['main_cat_id'] = $request->catid;
   	    $categories['sub_cat_id'] = $request->subcatid;   		
    	
    	$properties=Property::with('PropertyImages')->with('PropertyLinks')->where(['main_category_id'=>$request->catid,'sub_category_id'=>$request->subcatid])->orderby('id','desc')->paginate(10);
    	
    	$catid=$request->catid;
    	if ($request->ajax()) {
            return view('frontend.property.partialPropertylist', compact('properties','categories','catid' ))->render();
        }
    	return view('frontend.property.propertylist',compact('properties','categories','catid'));   	
    }
    
    /*
    |--------------------------------------------------------------------------
    | viewSingleProperty Method
    |--------------------------------------------------------------------------
    |
    |  
    |
   */
    public function viewSingleProperty(Request $request)
    {	
    	Log::info('View single property .', ['property_id'=>$request->property_id] );	
    	$property_id= $request->property_id;    		
		$property=Property::with('PropertyImages')->with('PropertyLinks')->where('id',$property_id)->first();
		
		if(!empty($property)){
			return ['success'=>true,'data'=>$property, 'message'=>self::SUCCESS_MESSAGE];
		}
		
    	return ['success'=>false,'message'=>self::ERROR_MESSAGE];
    }
    
    /*
    |--------------------------------------------------------------------------
    | propertyFilter Method
    |--------------------------------------------------------------------------
    |
    |  
    |
  */
    public function propertyFilter(Request $request)
    {	
    	//log for the method
    	Log::info('View single property', ['property_id'=>$request->property_id] );
    	
    	$filters=$request->all();    
    	$properties=Property::with('PropertyImages')->with('PropertyLinks')->where(
    	function($query) use($filters){
      			if(isset($filters['to_let'])){
    	  		 $query->where('use_for',$filters['to_let']);
    	  		}
    			if(isset($filters['for_sale'])){
    	  		 $query->orWhere('use_for',$filters['for_sale']);
    	  		}
    	  		if(isset($filters['short_let'])){
    	  		 $query->orWhere('use_for',$filters['short_let']);
    	  		}
    	 })->where(['main_category_id'=>$filters['main_cat_id'],'sub_category_id'=>$filters['sub_cat_id']])->orderby('id','desc')->paginate(10);

       if(isset($properties) && !empty($properties)){	
  	   	if ($request->ajax()) {
       	return view('frontend.property.partialPropertylist', compact('properties','categories','catid' ))->render();
       	}
  	   }
      	return ['success'=>false, 'data'=>self::ERROR_MESSAGE];
    	
    }
    
    
}

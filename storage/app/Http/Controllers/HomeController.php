<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MainCategories;
use App\Models\MainCategorySubscription;
use App\Models\MainCategorySubscriptionLog;
use App\Models\SubCategory;
use App\Models\SubcategorySubscription;
use App\Models\SubcategorySubscriptionLogs;
use Auth;


class HomeController extends Controller
{

    
    public function index()
    {        
  		
        $mainCategories=MainCategories::select('*')->get();
        $maxSubCount=MainCategories::max('total_subscriptions');
        $subscriptionMaxCount=MainCategories::select('*')->where('total_subscriptions',$maxSubCount)->first(); 
        if(Auth::check())
        {    
            $user_id= Auth::user()->id;
            foreach($mainCategories as $key=>$value)
            {
                $subscribeMainCategories=MainCategorySubscription::select('*')->where(['main_category_id'=>$value['id'],'user_id'=>$user_id])->first();
                $mainCategories[$key]['subscription_status_type']=$subscribeMainCategories['status_type'];
            }
        }

        //echo"<pre>"; print_r($mainCategories);echo"</pre>";
        //exit;


    	return view('frontend.index',compact('mainCategories','subscriptionMaxCount'));   
    }
    
    public function subscribeMainCategory(Request $request)
    {    
    	$main_category_id = $request->main_category_id;
    	
    	//Find first subcategory id from the main category
    	
    	$SubCategory=SubCategory::select('id')->where(['main_category_id'=>$main_category_id])->first();
    	    	
    	if(Auth::check())
    	{
    		$user_id=Auth::user()->id;
    		
    		$mainCategorySub=MainCategorySubscription::select('*')->where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->first();
    		if(isset($mainCategorySub) && !empty($mainCategorySub))
    		{
    			
    			$status_type= $mainCategorySub->status_type;
    			
    			if($status_type==1)
    			{
    				$update_status_type='0';
    				$mainCatSubsLogdata['enddate']=date('Y-m-d H:i:s');
                    $subCatSubsLogdata['enddate']=date('Y-m-d H:i:s');
                 
                    //Subcategory decrement 
                    if(!empty($SubCategory))
                    {
                      $subCatSubCounts=SubCategory::select('*')->where('main_category_id',$main_category_id)->get();
                      
                      foreach($subCatSubCounts as $key=>$value)
                      {
                      		if($value->total_subscriptions_counts!='0')
                      		{
                       			SubCategory::where('id',$value->id)->decrement('total_subscriptions_counts');
                       			$mainSubCount=MainCategories::select('total_subscriptions')->where('id',$main_category_id)->first();
                    			if($mainSubCount->total_subscriptions!='0')
                    			{
                    				MainCategories::where('id',$main_category_id)->decrement('total_subscriptions');
                    			}
                      		}
                      }
                      
                      
                    }
                    
                   
                    
    			}
    			else
    			{
    			    $update_status_type='1';
    			    //main category sub log data
    			    $mainCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
    			 	$mainCatSubsLogdata['enddate']='';
    			    //sub category sub log data
    			    $subCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
    			    $subCatSubsLogdata['enddate']='';
                    MainCategories::where('id',$main_category_id)->increment('total_subscriptions');
                    
                    //Subcategory increment
                    if(!empty($SubCategory)){ 
                    SubCategory::where('id',$SubCategory->id)->increment('total_subscriptions_counts');
                    }
    			}
    		   //Main category subcription     			
    		   $update=MainCategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->update(['status_type'=>$update_status_type]);

               //main category sibscription logs  
    	    		   
    		   $updateMaincatSubsLog=MainCategorySubscriptionLog::where(['main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($mainCatSubsLogdata);	
    		   
    		   ///Subcategory section 
    		   
             	if(!empty($SubCategory))
             	{
             		
    		   		//Subcategory subcription    		    
    		    	$updateSubcatSub=SubcategorySubscription::where(['user_id'=>$user_id,'main_category_id'=>$main_category_id,'subcategory_id'=>$SubCategory->id])->update(['status_type'=>$update_status_type]); 
    		      
                	//Subcategory subcription  log                
                       
                	$updateSubCatSubsLog=SubcategorySubscriptionLogs::where(['subcategory_id'=>$SubCategory->id,'main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($subCatSubsLogdata);
				}
				
				$updateSubcatSubdata=SubcategorySubscription::select('*')->where(['user_id'=>$user_id,'main_category_id'=>$main_category_id])->get();
				
				if(!empty($updateSubcatSubdata))
				{
				  foreach($updateSubcatSubdata  as $key=>$value)
				   {
				   	 if($value->status_type!='0')
				   	 {
				   	   //Subcategory subcription    		    
    		    	   $updateSubcatSub=SubcategorySubscription::where(['id'=>$value->id])->update(['status_type'=>$update_status_type]); 
    		    	   $updateSubCatSubsLog=SubcategorySubscriptionLogs::where(['subcategory_id'=>$value->id,'main_category_id'=>$main_category_id,'user_id'=>$user_id])->update($subCatSubsLogdata);
    		    	 }
    		      
				  }
				} 
					
    		  	if(isset($updateMaincatSubsLog))
    		  	{    		  
                    $totalSubscription=MainCategories::select('total_subscriptions')->where('id',$main_category_id)->first()->toArray();
                    return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>'subscription Updated!'];     
    		  	}
    		 }    		 
    		   else    		 
    		 {    		   
    		  //main category Subscription	create for first time
    		   $mainSubdata['main_category_id']=$main_category_id;
    		   $mainSubdata['user_id']=$user_id;
    		   $mainSubdata['status_type']='1';    		   
    		   $createSubcription=MainCategorySubscription::create($mainSubdata);    	
    		   
    		   //main category Subscription log	
    		   $mainCatSubsLogdata['main_category_id']=$main_category_id;  
    		   $mainCatSubsLogdata['user_id']=$user_id;   
    		   $mainCatSubsLogdata['start_date']=date('Y-m-d H:i:s');
    		   $createMainCatSubsLog=MainCategorySubscriptionLog::create($mainCatSubsLogdata);	

               //In crement value of total_subscription
                MainCategories::where('id',$main_category_id)->increment('total_subscriptions');
                if(!empty($SubCategory))
             	{ 
                  SubCategory::where('id',$SubCategory->id)->increment('total_subscriptions_counts');

                  //Sub category Subscription   create for first time
                  $subCatSubsdata['main_category_id']=$main_category_id;
                  $subCatSubsdata['user_id']=$user_id;
                  $subCatSubsdata['subcategory_id']=$SubCategory->id;               
                  $subCatSubsdata['status_type']='1';              
                  $createSubcription=SubcategorySubscription::create($subCatSubsdata);       
               
                  //Sub category Subscription log 
                  $subCatSubsdatalogs['main_category_id']=$main_category_id;  
                  $subCatSubsdatalogs['user_id']=$user_id;   
                  $subCatSubsdatalogs['subcategory_id']=$SubCategory->id; 
                  $subCatSubsdatalogs['start_date']=date('Y-m-d H:i:s');
                  $createSubCatSubsLog=SubcategorySubscriptionLogs::create($subCatSubsdatalogs);
			   }
    		   if(isset($createMainCatSubsLog))
    		   {    		  
                    $totalSubscription=MainCategories::select('total_subscriptions')->where('id',$main_category_id)->first()->toArray();
    		  		return ['success'=>true, 'subscription_count'=>$totalSubscription,'message'=>'subscription Created!'];   
    		   }
    		   
    		}
    		  
    	}     	
    	 else
    	{
    	  
    	  return ['success'=>false, 'message'=>'you are not authenticated!'];
    	}
    	 						
    		
    		
    		   	
    }


 }
    


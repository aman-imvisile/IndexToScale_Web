<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    const NO_AUTH_MESSAGE ='You are not authenticated.';
    const SUBS_CREATED_SUCCESS_MESSAGE ='Subscription created successfully.';
    const SUBS_UPDATED_SUCCESS_MESSAGE ='Subscription updated successfully.';
    const STATUS_ONE='1';     
    const STATUS_ZERO='0';	  
   

	/*
    |--------------------------------------------------------------------------
    | Index Method
    |--------------------------------------------------------------------------
    |
    |  
    |
   */
    public function index()
    {  	
    	Log::info('listing of all main categories');	
        $mainCategories=MainCategories::select('*')->paginate(10);
        $maxSubCount=MainCategories::max('total_subscriptions');
        $subscriptionMaxCount=MainCategories::select('*')->where('total_subscriptions',$maxSubCount)->first(); 
       
            foreach($mainCategories as $key=>$value) {
             $subCategoryTotalSubscription=SubCategory::where('main_category_id', $value['id'])->sum('total_subscriptions_counts');
             $mainCategories[$key]['subCategoryTotalSubscription']=$this->number_format_short($subCategoryTotalSubscription);
            if(Auth::check()){ 
             $user_id= Auth::user()->id;
             $subscribeMainCategories=SubcategorySubscription::select('*')->where(['main_category_id'=>$value['id'],'user_id'=>$user_id])->first();
             $mainCategories[$key]['subscription_status_type']=$subscribeMainCategories['status_type'];
            }
        }
    	return view('frontend.index',compact('mainCategories','subscriptionMaxCount'));   
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
   


 }
    


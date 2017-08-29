<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MainCategories;
use App\Models\User;
use Illuminate\Support\Facades\View;
use App\Models\UserType;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	//To get main categories
		$main_categories = MainCategories::with('subcategories')->get();		//	echo "<pre/>"; print_r($main_categories);
		$adminusers = User::select('*')->where('user_type','=', '2') ->orderBy('id', 'desc')->get();
		$privilege=array();
		
		
		View::composer('includes.adminheader', function($view) use($main_categories,$adminusers) {
			if(Auth::check())
			{			
			  $privileString=Auth::user()->privileges;
			  $privileges=explode(',',$privileString);
			}
			$view->with(['main_category_data'=>$main_categories,'adminusers_data'=>$adminusers,'privileges'=>$privileges]);
		});
		View::composer('includes.simpleAdminHeader', function($view) use($main_categories,$adminusers) {
			if(Auth::check())
			{
			  $privileString=Auth::user()->privileges;
			  $privileges=explode(',',$privileString);
			}
			$view->with(['main_category_data'=>$main_categories,'adminusers_data'=>$adminusers,'privileges'=>$privileges]);
		});
		
			View::composer('includes.propertyCategoryHeader', function($view) use($main_categories) {					
			$view->with(['main_category_data'=>$main_categories]);
		});

		View::composer('admin.admin_users.header', function($view) {
			$usertype = UserType::select('*')->get();					
			$view->with(['usertype'=>$usertype]);
		});
		
		View::composer('admin.property.header', function($view) use($main_categories){	
			$view->with(['maincategories'=>$main_categories]);
		});
    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

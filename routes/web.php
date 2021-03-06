<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Start frontend
Route::get('savedlibrary',function () {
    return view('frontend.property.savedlibrary');
});

Route::get('ads',function () {
    return view('frontend.property.ads');
});
Route::get('collections',function () {
    return view('frontend.property.collections');
});
Route::get('search',function () {
    return view('frontend.property.search');
});


Route::post('frontend/user/login','Auth\LoginController@login');
Route::get('frontend/user/logout','Auth\LoginController@logout');
Route::post('frontend/user/register','Auth\RegisterController@registerUser');
Route::get('/',['as'=>'home', 'uses'=>'HomeController@index']);
Route::post('subscribe/maincategory','HomeController@subscribeMainCategory');

//Start Property section
Route::get('subcategory/{catid}','PropertyController@index');
Route::get('property/list/{catid}/{subcatid}','PropertyController@propertyList');
Route::post('property/subscribe/subcategory','PropertyController@subscribeSubCategory');
Route::post('property/viewsingleproperty','PropertyController@viewSingleProperty');
Route::post('property/filter','PropertyController@propertyFilter');


//end frontend section

////////////////////////////////////////////////////////////////////////
//Start admin section
Route::get('admin/login','admin\auth\LoginController@create');

Route::get('admin',function(){
return redirect ('admin/login');
});

Route::post('admin/login','admin\auth\LoginController@login');
Route::get('admin/logout','admin\auth\LoginController@logout');



//********************For all admin******************************

Route::group(['middleware'=> 'AllAdmin', 'prefix'=>'admin'], function(){
Route::get('dashboard','admin\DashboardController@index');

//Update Admin profile
Route::get('profile/edit/{id}', 'admin\UserController@editAdmin');
Route::post('profile/update', 'admin\UserController@updateAdmin');

//Internal mailbox system
Route::get('inbox', ['as'=>'inbox' ,'uses'=> 'admin\InboxController@inboxlist']);
Route::post('inbox', 'admin\InboxController@inboxlist');

//property data
Route::get('property/list/{catid}/{subcatid}', 'admin\PropertyController@propertylist');
Route::post('property/list', 'admin\PropertyController@propertylist');


//Property Sub-Category data
Route::get('property/subcategory/list', 'admin\PropertyCategoryController@property_categoryList');
Route::post('property/subcategory/list', 'admin\PropertyCategoryController@property_categoryList');

//fashion data

Route::get('fashion/list', 'admin\FashionController@fashionlist');
Route::post('fashion/list', 'admin\FashionController@fashionlist');
});

//**************End for all admin****************

Route::get('products','admin\ProductController@products');
Route::post('products/import','admin\ProductController@import');

//***********For superadmin***********************************
Route::group(['middleware'=> 'SuperAdmin', 'prefix'=>'admin'], function(){


//admin user data
Route::get('user/list/{id}', 'admin\UserController@useractivity');
Route::post('user/list', 'admin\UserController@useractivity');
Route::get('users/list/{user_type}', 'admin\UserController@userlist');
Route::post('users/list', 'admin\UserController@userlist');
Route::get('user/create', 'admin\UserController@create');
Route::post('user/create', 'admin\UserController@adduser');
Route::get('user/summary', 'admin\UserController@user_summary');
Route::post('user/summary', 'admin\UserController@user_summary');


//property data
Route::get('property/create', 'admin\PropertyController@create');
Route::post('property/create', 'admin\PropertyController@addproperty');
Route::get('property/edit/{id}', 'admin\PropertyController@edit');
Route::post('property/update', 'admin\PropertyController@update');
Route::get('property/delete/{id}','admin\PropertyController@delete');
Route::post('property/import', 'admin\PropertyController@import');
Route::get('property/export/{type}', 'admin\PropertyController@export');

//Main Category data
Route::get('maincategory/create', 'admin\MainCategoriesController@create');
Route::post('maincategory/create', 'admin\MainCategoriesController@add_main_category');
Route::get('category/summary', 'admin\MainCategoriesController@category_summary');
Route::post('category/summary', 'admin\MainCategoriesController@category_summary');

// finance data
Route::get('finance/create', 'admin\FinanceController@create');
Route::post('finance/create', 'admin\FinanceController@addfinance');
Route::get('finance/list/{finance_type}/','admin\FinanceController@financelist');
Route::post('finance/list', 'admin\FinanceController@financelist');
Route::get('finance/edit/{id}', 'admin\FinanceController@editFinance');
Route::post('finance/update', 'admin\FinanceController@updateFinance');
Route::get('finance/delete/{id}','admin\FinanceController@deleteFinancetype');



// User Types
Route::get('userType/add', 'admin\UserController@addnew_userType');
Route::post('userType/add', 'admin\UserController@savenew_userType');
Route::get('userType/list', 'admin\UserController@userTypelist');
Route::post('userType/list', 'admin\UserController@userTypelist');
Route::get('userType/edit/{id}', 'admin\UserController@edit_userType');
Route::post('userType/update', 'admin\UserController@update_userType');
Route::get('userType/delete/{id}', 'admin\UserController@deleteUserType');

//Property Sub-Category data
Route::get('property/subcategory/create', 'admin\PropertyCategoryController@create');
Route::post('property/subcategory/create', 'admin\PropertyCategoryController@create');


//fashion data
Route::get('fashion/create', 'admin\FashionController@create');
Route::post('fashion/create', 'admin\FashionController@create');

 });

//***********End for super admin***********************************
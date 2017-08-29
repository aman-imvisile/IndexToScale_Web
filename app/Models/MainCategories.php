<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategories extends Model
{
    protected $table = 'main_categories';
    
    protected $fillable = ['main_category_name','main_category_image','total_subscriptions'];
    
    public function subcategories(){
    	return $this->hasMany('App\Models\SubCategory','main_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
	public $timestamps = false;
	protected $fillable = ['main_category_id','category_name','category_image','total_subscriptions_counts'];
	
	public function SubcategorySubscription()
	{
		//	
	}
	
	
	
}

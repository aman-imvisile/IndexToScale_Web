<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategorySubscriptionLogs extends Model
{
       
    protected $table = 'subcategory_subscription_logs';
    public $timestamps = false;
    protected $fillable = ['main_category_id','subcategory_id','user_id' ,'start_date','end_date'];  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategorySubscriptionLog extends Model
{
    protected $table = 'main_category_subscription_logs';
    public $timestamps = false;    
    protected $fillable = ['main_category_id','user_id','start_date','enddate'];
}

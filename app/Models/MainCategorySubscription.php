<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategorySubscription extends Model
{
    protected $table = 'main_category_subscription';
    protected $fillable = ['main_category_id','user_id','status_type'];
}
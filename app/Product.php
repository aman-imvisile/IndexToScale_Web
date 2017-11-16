<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product	extends Model
{ 
    protected $table = 'products';
    protected $fillable = ['sku','name','desc','price','currency','size','type','category','image','created_at','updated_at'];
}

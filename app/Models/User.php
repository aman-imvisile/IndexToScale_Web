<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user_details';
    protected $fillable=['fullname','username','email','password','user_type','profile_image','profile_thumbnail','latitude', 'longitude', 'address','phone','privileges','permission'];
    
}

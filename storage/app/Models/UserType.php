<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';
	protected $fillable = ['usertype_name'];

	// public function PropertyImages() 
// 	{
// 		return $this->hasMany('App\Models\PropertyImages','property_id');
// 	}
}
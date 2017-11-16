<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
	protected $fillable = ['main_category_id','sub_category_id','street_number','street_name','property_name','latitude','longitude','pincode',
	'city','area','address','country','image','image_thumbnail','approx_geo','neighbourhood','num_baths','num_beds','floor_area_meters',
	'amenities','transport','interior','exterior','floor_area','privacy','area_safety','prestige','lot','views','seaside','riverside','internet_speed'];

	public function PropertyImages() 
	{
		return $this->hasMany('App\Models\PropertyImages');
	}
	
	public function PropertyLinks() 
	{
		return $this->hasMany('App\Models\PropertyLinks','property_id');
	}
}

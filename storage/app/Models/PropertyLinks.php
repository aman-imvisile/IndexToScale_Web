<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyLinks extends Model
{
      protected $table = 'property_extra_link';
	protected $fillable = ['property_id','url','main_title','small_title','icon_image','icon_image_thumbnail'];
}

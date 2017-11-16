<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTable extends Model
{
    protected $table = 'country_table';
	protected $fillable = ['country_code','country_name'];
}

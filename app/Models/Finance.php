<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
	protected $table='finance';
	public $timestamps = false;
	protected $fillable=['finance_type', 'main_title', 'sub_title', 'monthly_price', 'yearly_price', 'description', 'indexes', 'updates', 'trackings', 'summary_chart', 'personalities', 'forecast_strategy', 'early_bird'];
    
}

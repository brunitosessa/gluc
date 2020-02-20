<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionHour extends Model
{
	protected $fillable = [
		'date', 'start_time', 'end_time', 'enabled', 'promotion_id'
 	];
 	
    public function promotion()
    {
    	return $this->belongsTo('App\Promotion');
    }
}

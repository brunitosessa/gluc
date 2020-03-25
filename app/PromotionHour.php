<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PromotionHour extends Model
{
	protected $fillable = [
		'date', 'start_time', 'end_time', 'enabled', 'promotion_id'
 	];
 	
    public function promotion()
    {
    	return $this->belongsTo('App\Promotion');
    }

    //Mutators

    public function getStartTimeAttribute($value) {
        return Carbon::parse($value)->format('H:i');
    }

    public function getEndTimeAttribute($value) {
        return Carbon::parse($value)->format('H:i');
    }

    //End Mutators
}

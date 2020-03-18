<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BusinessHour extends Model
{
	protected $fillable = [
		'date', 'start_time', 'end_time', 'enabled', 'bar_id',
 	];

	public function bar()
    {
        return $this->belongsTo('App\Bar');
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

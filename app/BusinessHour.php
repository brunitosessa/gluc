<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
	protected $fillable = [
		'date', 'start_time', 'end_time', 'enabled',
 	];

	public function bar()
    {
        return $this->belongsTo('App\Bar');
    }
}

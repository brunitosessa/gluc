<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
	public function bar()
    {
        return $this->belongsTo('App\Bar');
    }
}

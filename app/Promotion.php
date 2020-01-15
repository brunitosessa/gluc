<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function bar()
    {
    	return $this->belongsTo('App\Bar');
    }
}

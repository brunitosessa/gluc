<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function happyglucs()
    {
    	return $this->belongsToMany('App\Happygluc');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Happygluc extends Model
{
	protected $fillable = [
		'frequency', 'quantity', 'exclusive', 'bar_id', 'enabled',
 	];
   
	protected $hidden = [
         
 	];

    public function bar()
    {
        return $this->hasOne('App\Bar');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
	protected $fillable = [
		'name', 'style', 'description', 'brand', 'color', 'ibu', 'alcohol', 'price', 'happyhour_price', 'bar_id', 
 	];

    public function bar()
    {
        return $this->belongsTo('App\Bar');
    }
}

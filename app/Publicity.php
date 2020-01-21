<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicity extends Model
{
	protected $fillable = [
		'title', 'image', 'description', 'city_id', 'end_date', 'enabled',
 	];
   
	protected $hidden = [

 	];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}

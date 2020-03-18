<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $fillable = [
		'title', 'image', 'address', 'lat', 'lng', 'description', 'city_id', 'bar_id', 'enabled', 'date', 
 	];
   
	protected $hidden = [

 	];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function bar()
    {
        return $this->belongsTo('App\Bar');
    }

    public function types()
    {
        return $this->belongsToMany('App\EventType')->withTimestamps();
    }

}

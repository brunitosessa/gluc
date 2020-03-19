<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
	protected $fillable = [
		'type'
 	];

    public function events()
    {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }
}

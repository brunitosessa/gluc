<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $fillable = [
		'title', 'image', 'description', 'happyhour', 'enabled', 'exclusive', 'bar_id', 'end_date',
 	];
   
	protected $hidden = [

 	];

    public function bar()
    {
    	return $this->belongsTo('App\Bar');
    }

    public function hours()
    {
    	return $this->hasMany('App\PromotionHour');
    }
}

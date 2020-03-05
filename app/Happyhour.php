<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Happyhour extends Model
{
    public function bar()
    {
        return $this->hasOne('App\Bar');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    public function Detail()
    {
        return $this->belongsTo('App\Details');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }
}

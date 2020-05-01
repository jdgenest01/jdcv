<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public function infos()
    {
        return $this->hasMany('App\Infos');
    }

    public function group()
    {
        return $this->belongsTo('App\Groups');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }
}

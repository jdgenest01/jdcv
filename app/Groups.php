<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function details()
    {
        return $this->hasMany('App\Details');
    }

    public function user()
    {
        return $this->belongsTo('App\Users');
    }
}

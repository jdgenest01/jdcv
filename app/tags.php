<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function infos()
    {
        return $this->belongsToMany('App\Infos', "tagsinfos");
    }

    public function details()
    {
        return $this->belongsToMany('App\Details',  "tagsdetails");
    }
}

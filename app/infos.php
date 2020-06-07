<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{

    protected $fillable = ['title', "description", "link", "date", "details_id"];

    public function Detail()
    {
        return $this->belongsTo('App\Details');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags', "tagsinfos");
    }
}

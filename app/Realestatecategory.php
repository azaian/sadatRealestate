<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realestatecategory extends Model
{
    public function categoryfeilds()
    {
        return $this->hasMany('App\Categoryfeild', 'cat_id')->get();
    }

    public function categorydistricts()
    {
        return $this->hasMany('App\District', 'cat_id')->get();
    }
}

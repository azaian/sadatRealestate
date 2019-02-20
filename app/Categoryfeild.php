<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryfeild extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Realestatecategory', 'cat_id')->first();
    }
    public function Data($id)
    {
        return $this->hasMany('App\Rsextradata', 'cf_id')->where('rs_id', $id)->first();
    }
}

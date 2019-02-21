<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realestate extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];



    public function extraFields()
    {
        return $this->hasMany('App\Rsextradata', 'rs_id')->get();
    }


    public function extraImages()
    {
        return $this->hasMany('App\Rsextrapicture', 'rs_id')->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Realestatecategory', 'cat_id')->first();
    }
    public function district()
    {
        return $this->hasOne('App\District', 'id', 'district')->first();
    }

    public function messages()
    {
        return $this->hasMany('App\Contactus', 'rs_id')->get();
    }
}

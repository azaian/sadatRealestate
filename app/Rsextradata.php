<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsextradata extends Model
{
  protected $table = 'rsextradata';
  public function fieldData()
  {
    return $this->belongsTo('App\Categoryfeild','cf_id')->first();
  }
}

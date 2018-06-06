<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
  public function users()
  {
      return $this->hasMany('App\user', 'university_id');
  }
}

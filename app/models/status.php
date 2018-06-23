<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    public function users()
    {
      return $this->hasMany('App\User','status_id');
    }
}

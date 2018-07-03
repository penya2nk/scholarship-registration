<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class stage extends Model
{
      use SoftDeletes;
      protected $dates = ['start_date','end_date'];

      public function parameteres()
      {
        return $this->hasMany('App\parameter', 'stage_id');
      }
}

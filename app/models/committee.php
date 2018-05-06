<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class committee extends Model
{
    protected $dates = ['date_from', 'date_end'];

    public function positions()
    {
      return $this->belongsTo('App\models\position', 'position_id');
    }
}

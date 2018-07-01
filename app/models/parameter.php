<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class parameter extends Model
{
    use SoftDeletes;

    public function stage()
    {
      return $this->belongsTo('App\models\stage','stage_id');
    }
}

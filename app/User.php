<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['born_date', 'ibu_tanggal_lahir', 'ayah_tanggal_lahir'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function organizations()
    {
        return $this->hasMany('App\models\organization', 'user_id');
    }

    public function committees()
    {
        return $this->hasMany('App\models\committee', 'user_id');
    }

    public function competitions()
    {
        return $this->hasMany('App\models\competition', 'user_id');
    }

    public function charities()
    {
        return $this->hasMany('App\models\charity', 'user_id');
    }

    public function publications()
    {
        return $this->hasMany('App\models\publication', 'user_id');
    }

    public function trainings()
    {
        return $this->hasMany('App\models\training', 'user_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\models\institution', 'university_id');
    }

    public function status()
    {
        return $this->belongsTo('App\models\status', 'status_id');
    }

    public function parameters()
    {
      return $this->belongsToMany('App\models\parameter','user_parameter')
        ->withPivot('score','lock')
        ->withTimestamps();
    }
}

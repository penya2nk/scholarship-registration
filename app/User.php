<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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
}

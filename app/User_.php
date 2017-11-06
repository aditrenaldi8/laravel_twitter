<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_ extends Model
{
    protected $table = 'users';

    public function data_user()
    {
        return $this->hasOne('App\DataUser');
    }
}

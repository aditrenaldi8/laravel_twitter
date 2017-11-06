<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User_');
    }

    public function status()
    {
        return $this->hasMany('App\Status');
    }

    public function friend()
    {
        return $this->hasMany('App\Friend');
    }


}

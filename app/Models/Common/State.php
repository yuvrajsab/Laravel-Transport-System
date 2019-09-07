<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function cities()
    {
        return $this->hasMany('App\Models\Common\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Common\Country');
    }
}

<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function state()
    {
        return $this->belongsTo('App\Models\Common\State');
    }
}

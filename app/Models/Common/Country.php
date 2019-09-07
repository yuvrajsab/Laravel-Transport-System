<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function states()
    {
        return $this->hasMany('App\Models\Common\State');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Customer extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function country()
    {
        return $this->belongsTo('App\Models\Common\Country');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Common\State');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Common\City');
    }

    public function consignor()
    {
        return $this->hasMany('App\Models\Consignor');
    }

    public function consignee()
    {
        return $this->hasMany('App\Models\Consignee');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('customer');   
    }
}

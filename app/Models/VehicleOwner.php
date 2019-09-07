<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class VehicleOwner extends Model implements HasMedia
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

    public function vehicle()
    {
        return $this->hasOne('App\Models\Vehicle');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('vehicle_owner');   
    }
}

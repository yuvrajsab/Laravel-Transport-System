<?php

namespace App\Models\Consignment;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Consignment extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function freight()
    {
        return $this->hasOne('App\Models\Consignment\Freight');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Consignment\Invoice');
    }

    public function insurance()
    {
        return $this->hasOne('App\Models\Consignment\Insurance');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('consignment');   
    }
}

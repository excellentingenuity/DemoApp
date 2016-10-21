<?php

namespace App\Locations;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;


class Location extends EloquentUUID
{
    use SoftDeletes;

    protected $fillable = ['name', 'map'];

    protected $dates = ['deleted_at'];

    public function expos()
    {
        return $this->belongsToMany('App\Expos\Expo');
    }

    public function address()
    {
        return $this->morphOne('App\Addresses\Address', 'addressable');
    }

    public function booths()
    {
        return $this->hasMany('App\Booths\Booth', 'location_id', 'id');
    }
}

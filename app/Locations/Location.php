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
        return $this->belongsToMany(App\Expos\Expo::class);
    }

    public function address()
    {
        return $this->hasOne(App\Addresses\Address::class, 'id', 'address_id');
    }

    public function booths()
    {
        return $this->hasMany(App\Booths\Booth::class, 'location_id', 'id');
    }
}

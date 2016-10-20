<?php

namespace App\Locations;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;


class Location extends EloquentUUID
{
    use SoftDeletes;

    protected $fillable = ['name', 'map'];

    public function expos()
    {
        return $this->belongsToMany(App\Expos\Expo::class);
    }
}

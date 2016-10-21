<?php

namespace App\Expos;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expo extends EloquentUUID
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['start_date', 'end_date', 'name', 'description'];

    public function locations()
    {
        return $this->belongsToMany('App\Locations\Location');
    }

    public function type()
    {
        return $this->belongsToMany('App\Tags\Tag');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservations\Reservation');
    }
}

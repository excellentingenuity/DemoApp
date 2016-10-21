<?php

namespace App\Booths;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booth extends EloquentUUID
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['number', 'cost', 'latitude', 'longitude', 'width', 'depth'];

    public function location()
    {
        return $this->belongsTo('App\Locations\Location');
    }
}

<?php

namespace App\Booths;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booth extends EloquentUUID
{
    use SoftDeletes;

    protected $fillable = ['number', 'cost'];

    public function location()
    {
        return $this->belongsTo(App\Locations\Location::class);
    }
}

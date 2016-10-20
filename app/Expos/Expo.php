<?php

namespace App\Expos;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expo extends EloquentUUID
{
    use SoftDeletes;

    protected $fillable = ['start_date', 'end_date', 'name', 'description'];

    public function locations()
    {
        return $this->belongsToMany(App\Locations\Location::class);
    }

    public function type()
    {
        return $this->belongsToMany(App\Tags\Tag::class);
    }
}

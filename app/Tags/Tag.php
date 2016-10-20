<?php

namespace App\Tags;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends EloquentUUID
{
    use SoftDeletes;

    public function expos()
    {
        return $this->belongsToMany(App\Expos\Expo::class);
    }
}

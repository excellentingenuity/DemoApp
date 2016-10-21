<?php

namespace App\Tags;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends EloquentUUID
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function expos()
    {
        return $this->belongsToMany('App\Expos\Expo');
    }
}

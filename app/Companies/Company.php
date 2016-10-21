<?php

namespace App\Companies;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends EloquentUUID
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = ['name', 'logo'];

    public function reservations()
    {
        return $this->belongsToMany('App\Reservation\Reservations');
    }
}

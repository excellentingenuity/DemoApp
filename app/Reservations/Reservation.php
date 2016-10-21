<?php

namespace App\Reservations;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends EloquentUUID
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [];

    public function expo()
    {
        return $this->belongsTo('App\Expos\Expo');
    }

    public function booth()
    {
        return $this->hasOne('App\Booths\Booth', 'id', 'booth_id');
    }

    public function contact()
    {
        return $this->hasOne('App\Customers\Customer', 'id', 'contact_id');
    }

    public function documents()
    {
        return $this->hasMany('App\Documents\Document', 'id', 'reservation_id');
    }

    public function company()
    {
        return $this->hasOne('App\Companies\Company', 'id', 'company_id');
    }

}

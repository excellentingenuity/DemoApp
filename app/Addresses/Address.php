<?php

namespace App\Addresses;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends EloquentUUID
{
    use SoftDeletes;

    protected $fillable = ['street', 'city', 'state', 'postal_code', 'country', 'latitude', 'longitude'];

    public function location()
    {
        return $this->belongsTo(App\Locations\Location::class, 'address_id');
    }

    public function customer()
    {
        return $this->belongsTo(App\Customers\Customer::class, 'address_id');
    }
}

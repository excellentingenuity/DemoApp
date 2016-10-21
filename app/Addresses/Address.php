<?php

namespace App\Addresses;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Addresses
 */
class Address extends EloquentUUID
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = ['street', 'city', 'state', 'postal_code', 'country', 'latitude', 'longitude'];

    /**
     * addressable
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }

}

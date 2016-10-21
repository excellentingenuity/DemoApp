<?php

namespace App\Customers;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Customer
 * @package App\Customers
 */
class Customer extends EloquentUUID
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone_number', 'email'];

    /**
     * address
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne('App\Addresses\Address', 'addressable');
    }



}

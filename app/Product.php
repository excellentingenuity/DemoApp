<?php

namespace App;

use eig\EloquentUUID\EloquentUUID;

class Product extends EloquentUUID
{
    protected $fillable = ['product_name', 'quantity', 'price'];


}

<?php

namespace App\Booths;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booth extends EloquentUUID
{
    use SoftDeletes;
}

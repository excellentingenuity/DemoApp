<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations\Location;
use App\Http\Requests;

class LocationController extends Controller
{
    public function save()
    {

    }

    public function delete($id)
    {

    }

    public function view($id)
    {
        return response(Location::findOrFail($id)->toJson());
    }

    public function all()
    {
        return response(Location::all()->toJson());
    }

    public function find($term)
    {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Locations\Location;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function save()
    {

    }

    public function delete($id)
    {
        $location = Location::findOrFail($id);
        try {

        } catch (EntityNotFoundException $e) {
            logger('Model Not Found', $e);
            return response()->json(['deleted' => false]);
        }
        $location->delete();
        return response()->json(['deleted' => true]);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Locations\Location;
use App\Http\Requests;
use Ramsey\Uuid\Uuid;

/**
 * Class LocationController
 * @package App\Http\Controllers
 */
class LocationController extends Controller
{

    /**
     * save
     *
     * @param \Illuminate\Http\Request $request
     * @param null                     $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function save(Request $request, $id = null)
    {
        $location = null;
        if($id != null && $id != '')
        {
            $location = Location::findOrFail($id);
            $location->name = $request->input('name');
            $location->map = $request->input('map');
            $location->save();
        } else {
            $location = Location::create([
                 'name' => $request->input('name'),
                 'map' => $request->input('map')
            ]);
        }
        return response($location->toJson());

    }

    /**
     * delete
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * view
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function view($id)
    {
        return response(Location::findOrFail($id)->toJson());
    }

    /**
     * all
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {
        return response(Location::all()->toJson());
    }

    /**
     * find
     *
     * @param $term
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function find($term)
    {
        if(Uuid::isValid($term))
        {
            return response(Location::findOrFail($term)->toJson());
        }
        return response(Location::where('name', $term)->firstOrFail()->toJson());
    }
}

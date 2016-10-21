<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use App\Locations\Location;
use App\Addresses\Address;
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
        $this->validate($request, [
            'name' => 'required',
            'map' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required|min:2',
            'postal_code' => 'required|numeric|min:5',
            'country' => 'required|min:2'
        ]);
        if($id != null && $id != '')
        {
            $location = Location::findOrFail($id);
            $location->name = $request->input('name');
            $location->map = $request->input('map');
            $address = $location->address;
            $address->street = $request->input('street');
            $address->city = $request->input('city');
            $address->state = $request->input('state');
            $address->postal_code = $request->input('postal_code');
            $address->country = $request->input('country');
            $address->save();
            $location->save();
        } else {
            $location = Location::create([
                 'name' => $request->input('name'),
                 'map' => $request->input('map'),
            ]);
            $address = Address::create([
                'street' => $request->input('street'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'postal_code' => $request->input('postal_code'),
                'country' => $request->input('country')
            ]);
            $location->address()->save($address);
            $location->address;
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

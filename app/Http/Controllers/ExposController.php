<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Expos\Expo;
use App\Http\Requests;

class ExposController extends Controller
{
    public function upcoming()
    {
        return response(
            Expo::upcoming()->get()->toJson()
        );
    }

    public function scheduled()
    {
        return response(
            Expo::scheduled()->get()->toJson()
        );
    }
}

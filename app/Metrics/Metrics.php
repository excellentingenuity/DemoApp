<?php

namespace App\Metrics;

use App\Companies\Company;
use App\Expos\Expo;
use App\Locations\Location;
use App\Reservations\Reservation;

class Metrics
{
    public static function dashboard_get()
    {
        return [
            'expos' => Expo::all()->count(),
            'reservations' => Reservation::all()->count(),
            'locations' => Location::all()->count(),
            'companies' => Company::all()->count()
        ];
    }
}
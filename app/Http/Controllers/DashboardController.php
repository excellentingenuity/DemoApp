<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Metrics\Metrics;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home', Metrics::dashboard_get());
    }

}

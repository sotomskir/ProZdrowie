<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasurementsController extends Controller
{
    public function index()
    {
        $measurements = \Auth::user()->personData()->get();
        return view('measurements.index', ['measurements' => $measurements, 'user' => \Auth::user()]);
    }
}

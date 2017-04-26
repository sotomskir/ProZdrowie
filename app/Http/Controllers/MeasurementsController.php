<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeasurement;
use App\Http\Requests\UpdateMeasurement;
use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Pozbędziemy się tego elementu walidacyjnego poniżej (zajrzyj w historię GIT)
     * korzystając z Form Request Validation
     * https://laravel.com/docs/5.4/validation#form-request-validation
     * eleganckie i bardzo przyjemne.
     */

    public function index(Request $request)
    {
        return view('measurements.index', [
            'measurements' => $request->user()->measurements()->get(),
            'user' => $request->user()
        ]);
    }

    public function store(StoreMeasurement $request)
    {
        $measurement = new Measurement($request->all());
        $request->user()->measurements()->save($measurement);

        return redirect()->route('measurements.index');
    }

    /**
     * Kontroller globalny, ale czy ten user może zrobićupdate tego konkretnie pomiaru?
     * Jak zapewnić warstwę logiczną która da nam dowolność w określaniu dostępu?
     * https://laravel.com/docs/5.4/authorization#creating-policies
     */
    public function update(UpdateMeasurement $request, Measurement $measurement)
    {
        $measurement->update($request->all());
        $request->user()->measurements()->save($measurement);
        return redirect()->route('measurements.index');
    }

    public function show(Measurement $measurement)
    {
        return view('measurements.edit', ['measurement' => $measurement]);
    }

    public function create(Request $request)
    {
        return view('measurements.create', ['user' => $request->user()]);
    }

    public function destroy(Measurement $measurement)
    {
        $measurement->delete();
        return redirect()->back();
    }
}

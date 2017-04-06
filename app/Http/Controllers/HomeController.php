<?php

namespace App\Http\Controllers;

use App\Services\DictsService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $dicts;

    /**
     * Create a new controller instance.
     *
     * @param DictsService $dicts
     */
    public function __construct(DictsService $dicts)
    {
        $this->middleware('auth');
        $this->dicts = $dicts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $personData = $user->measurements()->get()->last();
        return view('home', [
            'user' => $user,
            'personData' => $personData,
            'dicts' => $this->dicts
        ]);
    }
}

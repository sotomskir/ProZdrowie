<?php

namespace App\Http\Controllers;

use App\Dict;
use App\Person;
use App\PersonData;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show($username) {
        dd(Dict::with('values')->get());
        dd(PersonData::where('username', $username)->first());
    }
}

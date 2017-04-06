<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Presenters\UsersPresenter;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        $sql = 'select u.first_name, u.last_name, u.sex, m1.* 
                from users u 
                JOIN (SELECT m.pal, m.height, m.weight, MAX (m.id) AS id FROM measurements m GROUP BY m.pal, m.height, m.weight) as m1 ON m1.id = u.id;';
        $users = \DB::select($sql);
        return view('ranking.index', ['users' => $users]);
    }
}

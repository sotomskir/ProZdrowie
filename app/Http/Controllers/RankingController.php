<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Presenters\UsersPresenter;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class RankingController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersRepository $usersRepository, Request $request)
    {
//        $sql = 'SELECT *
//                FROM users u
//                  JOIN (SELECT user_id, max(id) latest_measurement_id FROM measurements GROUP BY user_id) utm on utm.user_id = u.id
//                  JOIN measurements m ON utm.latest_measurement_id = m.id
//                ORDER BY u.id;';
//        $users = \DB::select($sql);
//        $users = User::where('publication_agreement', true)->get(); // N+1 Issue
//        $users = User::where('publication_agreement', true)->with('latestMeasurement')->orderBy('last_name')->get();
        return view('ranking.index', [
            'users' => $usersRepository->getUsersRankingByWeightLoss(),
            'logged' => $request->user()
        ]);
    }
}

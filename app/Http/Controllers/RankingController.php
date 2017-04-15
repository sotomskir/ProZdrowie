<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Presenters\UsersPresenter;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(UsersRepository $usersRepository, Request $request)
    {
        return view('ranking.index', [
            'users' => $usersRepository->getUsersRankingByWeightLoss(),
            'logged' => $request->user()
        ]);
    }
}

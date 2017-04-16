<?php namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    /**
     * @var User
     */
    private $usersGateway;

    public function __construct(User $usersGateway)
    {

        $this->usersGateway = $usersGateway;
    }

    public function getUsersRankingByWeightLoss()
    {
        $users = $this->usersGateway->with('measurements')->get();
        return $users->sortBy('weightDiff');
    }
}
<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Measurement;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function view(User $user, Measurement $measurement)
    {
        return $user->id === $measurement->user_id;
    }

    /**
     * Determine whether the user can create measurements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function update(User $user, Measurement $measurement)
    {
        return $user->id === $measurement->user_id;
    }

    /**
     * Determine whether the user can delete the measurement.
     *
     * @param  \App\User  $user
     * @param  \App\Measurement  $measurement
     * @return mixed
     */
    public function delete(User $user, Measurement $measurement)
    {
        return $user->id === $measurement->user_id;
    }
}

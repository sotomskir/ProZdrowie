<?php

namespace spec\App\Models;

use App\Models\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    function it_can_calculate_body_mass_index()
    {
        $this->bmi(180, 80)->shouldReturnApproximately(24.69, 1.0e-2);

        $this->bmi(180, 120)->shouldReturnApproximately(37.04, 1.0e-2);
    }

    function it_can_calculate_ppm()
    {
        $this->ppm(180, 80, 28, true)->shouldReturnApproximately(1878, 1.0);
        $this->ppm(180, 80, 28, false)->shouldReturnApproximately(1622, 1.0);
    }

    function it_can_calculate_cmp()
    {
        $this->cmp(2000, 1.4)->shouldReturn(2800.0);
    }

    function it_can_calculate_whr()
    {
        $this->whr(80, 80)->shouldReturn(1);
        $this->whr(50, 100)->shouldReturn(0.5);
    }
}

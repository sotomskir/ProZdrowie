<?php

namespace spec\App\Presenters;

use App\Dictionaries\ObesityType;
use App\Models\User;
use App\Presenters\UserPresenter;
use App\Services\DictionaryService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserPresenterSpec extends ObjectBehavior
{
    function let(User $user, DictionaryService $dict)
    {
        $this->beConstructedWith($user, $dict);
        $user->getAttribute('first_name')->willReturn('Jan');
        $user->getAttribute('last_name')->willReturn('Kowalski');
        $user->getAttribute('email')->willReturn('MyEmailAddress@example.com ');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserPresenter::class);
    }

    function it_can_render_full_name()
    {
        $this->getFullName()->shouldReturn('Jan Kowalski');
    }

    function it_can_return_gravatar_link()
    {
        $this->getGravatar()->shouldReturn('http://www.gravatar.com/avatar/0bc83cb571cd1c50ba6f3e8a78ef1346');
    }

}

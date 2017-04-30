<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Browser\Pages\Login;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(User::class)->create(['email' => 'testuser@psat.com']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                ->type('@email', $user->email)
                ->type('@password', 'secret')
                ->press('@submit')
                ->assertPathIs('/');
        });
    }
}

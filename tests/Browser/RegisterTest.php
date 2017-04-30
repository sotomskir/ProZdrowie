<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Browser\Pages\Register;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register)
                ->type('@firstName', 'Jan')
                ->type('@lastName', 'Kowalski')
                ->select('@pal')
                ->select('@sex')
                ->type('@email', 'jan.kowalski@example.com')
                ->check('@publishAgreement')
                ->type('@password', 'secret')
                ->type('@confirmPassword', 'secret')
                ->press('@submit')
                ->assertPathIs('/');
        });

        $this->assertDatabaseHas('users', [
            'email' => 'jan.kowalski@example.com'
        ]);
    }
}

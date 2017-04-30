<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class Register extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/register';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@firstName' => 'input[name=first_name]',
            '@lastName' => 'input[name=last_name]',
            '@pal' => 'select[name=pal]',
            '@sex' => 'select[name=sex]',
            '@email' => 'input[name=email]',
            '@publishAgreement' => 'input[name=publication_agreement]',
            '@password' => 'input[name=password]',
            '@confirmPassword' => 'input[name=password_confirmation]',
            '@submit' => 'button[type=submit]',
        ];
    }
}

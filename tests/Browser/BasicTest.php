<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BasicTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Register')
                // ->type('name', 'Kabbya')
                ->value('#name', 'Kabbya')
                ->value('#email', 'kabbya44@gmail.com')
                ->value('#password', '12345678')
                ->value('#password-confirm', '12345678')
                // ->attach('userimage', 'C:\images\taylor.jpg')
                // ->press('Register')
                // ->link('button[type="submit"]')
                ->click('button[type="submit"]') 
                // ->press('Kabbya');
                ->element('#user') ;
                if ($browser->seeLink('Logout')) {
                    $browser->clickLink('Logout')
                    // $browser->press('logout')

                    ->clickLink('Login')
                    ->value('#email', 'kabbya44@gmail.com')
                    ->value('#password', '12345678')
                    ->click('button[type="submit"]');
                }
                
        });
    }
}

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
            $browser->visit('register')
                ->type('name', 'Md Kabbya')
                ->type('email', 'kabbya44@gmail.ocm')
                ->type('password', '123456')
                ->type('password_confirmation', '123456')
                // ->attach('userimage', 'C:\images\taylor.jpg')
                ->press('Register')
                ->assertPathIs('/test');
        });
    }
    public function testCreateTodo()
    {
        $this->browse(function ($browser) {
            $browser->visit('todo')
                ->clickLink('Add Todo')
                ->type('todo', 'Testing it With Dusk')
                ->type('category', 'dusk')
                ->type('description', 'This is created with dusk')
                ->press('Add')
                ->assertPathIs('/todoapplaravel/public/todo');
        });
    }
}

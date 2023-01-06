<?php

namespace Tests\Unit;

use App\Models\User;
// use PHPunit\Framework\TestCase
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\UserController;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function it_show_all_user()
    {
        //Arange 
        // User::factory()->count(10)->create();

        // act
        $users = (new UserController)->index();
        $user_all = User::all();

        // Assert

        $this->assertEquals($user_all->count(),$users->count());

    }
    /** @test */
    public function it_show_single_user_id(){
        //arange 
        $new_user = User::factory()->create();
        
        // act 
        $user = (new UserController)->show($new_user->id);

        // assert
        $this->assertEquals($new_user->id,$user->id);
    }
}

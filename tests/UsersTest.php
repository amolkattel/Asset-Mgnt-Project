<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    /** @test */
    public function test_create_new_user_restriction()
    {
        $this->visit('/users/create')
            ->seePageIs('/auth/login');
    }

    /** @test */
    // public function test_create_new_user()
    // {
    //     $this->withoutMiddleware();

    //     $this->visit('/users/create')
    //         ->type('user1', 'name')
    //         ->type('user1@email.com', 'email')
    //         ->type('password', 'password')
    //         ->type('password', 'password_confirmation')
    //         ->select('status', '1')
    //         ->press('Save')
    //         ->seeInDatabase('users', ['email' => 'user1@email.com']);
    // }
}

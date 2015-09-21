<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function show_login_button()
    {
        $this->visit('/')
             ->see('Enter');
    }
    /** @test */
    public function test_login_form()
    {
        $this->visit('/auth/login')
            ->submitForm('Sign In', ['email' => 'admin@admin.com', 'password' => 'password'])
            ->see('Welcome!')
            ->onPage('home');
    }
}

<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_user()
    {
        $asset = factory(User::class)->create();

        $this->assertInstanceOf(User::class, $asset);
    }
}
// amol kattel
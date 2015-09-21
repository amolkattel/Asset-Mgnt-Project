<?php

use App\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_category()
    {
        $asset = factory(Category::class)->create();

        $this->assertInstanceOf(Category::class, $asset);
    }
}

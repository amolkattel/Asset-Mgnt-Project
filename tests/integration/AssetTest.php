<?php

use App\Asset;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssetTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_an_asset()
    {
        $asset = factory(Asset::class)->create();

        $this->assertInstanceOf(Asset::class, $asset);
    }
}

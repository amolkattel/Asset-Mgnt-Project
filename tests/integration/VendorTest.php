<?php

use App\Vendor;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VendorTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_vendor()
    {
        $asset = factory(Vendor::class)->create();

        $this->assertInstanceOf(Vendor::class, $asset);
    }
}

<?php

use App\Department;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartmentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_department()
    {
        $asset = factory(Department::class)->create();

        $this->assertInstanceOf(Department::class, $asset);
    }
}

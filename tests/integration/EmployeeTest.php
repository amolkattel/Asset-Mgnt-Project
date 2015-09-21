<?php

use App\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_adds_a_employee()
    {
        $asset = factory(Employee::class)->create();

        $this->assertInstanceOf(Employee::class, $asset);
    }
}

<?php

namespace Tests\Unit;

use App\Models\Beverage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_beverage_has_name()
    {
        $bevarage = Beverage::factory()->create();

        $this->assertNotEmpty($bevarage->name);
    }

    public function test_beverage_has_type()
    {
        $bevarage = Beverage::factory()->create();

        $this->assertNotEmpty($bevarage->type);
    }
}

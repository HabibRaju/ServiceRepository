<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_base_url()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_url()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
}

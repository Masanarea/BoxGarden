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
    public function test_example()
    {
        // $response = $this->get('/login');

        // $response->assertStatus(200);

        $this->assertTrue(true);

        $array = [];
        $this->assertEmpty($array);

        $message = "Hello";
        $this->assertEquals("Hello",$message );

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/');
        // $response = $this->get('/login');

        // $response->assertStatus(200);

        $this->assertTrue(true);

        $array = [];
        $this->assertEmpty($array);

        $message = "Hello";
        $this->assertEquals("Hello", $message);

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);
    }
}

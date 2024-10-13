<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/about');

        $response->assertStatus(200)->assertSeeText('Hello Murtaki');
    }

    public function testRedirect()
    {
        $response = $this->get('/contact')->assertRedirect('/about');
    }
}

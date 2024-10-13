<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSetCookie()
    {
        $response = $this->get('/cookie/set');

        $response->assertSeeText('Hello Cookie')->assertCookie("User-Id", "murtaki")->assertCookie("Is-Member", "true");
    }

    public function testGetCookie()
    {
        $response = $this->withCookie('User-Id', 'murtaki')->withCookie('Is-Member', 'true')->get('/cookie/get');
        $response->assertJson([
            'userId' => 'murtaki',
            'isMember' => 'true'
        ]);
    }
}

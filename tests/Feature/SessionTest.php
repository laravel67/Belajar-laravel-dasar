<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSession()
    {
        $response = $this->get('/session');

        $response->assertStatus(200)->assertSessionHas('userId', 'murtaki')->assertSessionHas('IsMember', true);
    }

    public function testGetSession()
    {
        $response = $this->withSession([
            'userId' => 'murtaki',
            'isMember' => 'true'
        ])->get('/session/get');
        $response->assertSeeText('murtaki')->assertSeeText('true');
    }
}

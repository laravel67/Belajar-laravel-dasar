<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $response = $this->get('/response');

        $response->assertStatus(200)->assertSeeText('Helo Response');
    }

    public function testHeader()
    {
        $response = $this->get('/response/header');
        $response->assertStatus(200)->assertSeeText("Murtaki")->assertSeeText("Shihab")->assertHeader('Content-Type', 'application/json')->assertHeader('author', 'Murtaki Shihab')->assertHeader("app", "Laravel Dasar");
    }

    public function testView()
    {
        $response = $this->get('/response/view');
        $response->assertSeeText('Murtaki');
    }

    public function testJson()
    {
        $response = $this->get('/response/json');
        $response->assertJson([
            'firstName' => 'Murtaki',
            'lastName' => 'Shihab'
        ]);
    }

    public function testFile()
    {
        $response = $this->get('/response/file');
        $response->assertHeader('Content-Type', "image/jpeg");
    }

    public function testDownload()
    {
        $response = $this->get('/response/download');
        $response->assertDownload('taki.jpg');
    }
}

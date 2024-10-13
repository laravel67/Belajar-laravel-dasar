<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UploadTest extends TestCase
{

    public function testUplaod()
    {
        $image = UploadedFile::fake()->image("murtaki.jpg");
        $this->post('/upload', [
            'picture' => $image,
        ])->assertSeeText("OK: murtaki.jpg");
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $firtsName = config('contoh.author.firts_name');
        $lastName = config('contoh.author.last_name');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Murtaki', $firtsName);
        self::assertEquals('Sihab', $lastName);
        self::assertEquals('murtaki@gmail.com', $email);
        self::assertEquals('https://jasaku.site', $web);
    }
}

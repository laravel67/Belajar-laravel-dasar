<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $murtaki = env('MURTAKI', 'Murtaki');

        self::assertEquals('Belajar Laravel Dasar', $murtaki);
    }


    public function testDefaultEnv()
    {
        $author = Env::get('AUTHOR', 'Murtaki');

        self::assertEquals('Murtaki', $author);
    }
}

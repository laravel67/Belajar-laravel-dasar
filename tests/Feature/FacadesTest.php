<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadesTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config('contoh.author.firts_name');
        $firstName2 = Config::get('contoh.author.firts_name');

        self::assertEquals($firstName1, $firstName2);
    }

    public function testConfigDepedency()
    {
        $config = $this->app->make('config');

        $firstName1 = config('contoh.author.firts_name');
        $firstName2 = Config::get('contoh.author.firts_name');
        $firstName3 = $config->get('contoh.author.firts_name');

        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName3);

        // var_dump($config->all());
    }


    public function testFacadesMock()
    {
        Config::shouldReceive('get')->with('contoh.author.firts_name')->andReturn('Murtaki Ganteng');
        $firstName = Config::get('contoh.author.firts_name');
        self::assertEquals('Murtaki Ganteng', $firstName);
    }
}

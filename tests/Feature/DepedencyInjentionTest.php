<?php

namespace Tests\Feature;


use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepedencyInjentionTest extends TestCase
{

    public function testDepedencyInjection()
    {
        $foo = new Foo();
        $bar = new Bar($foo);

        self::assertEquals('Foo and Bar', $bar->bar());
    }
}

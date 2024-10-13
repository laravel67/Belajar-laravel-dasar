<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\TestingService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceConteinerTest extends TestCase
{


    public function testBind()
    {
        $this->app->bind(Person::class, function () {
            return new Person("Murtaki", "shihab");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Murtaki", $person1->firstName);
        self::assertEquals("shihab", $person1->lastName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function () {
            return new Person("Murtaki", "shihab");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Murtaki", $person1->firstName);
        self::assertEquals("shihab", $person1->lastName);
        self::assertSame($person1, $person2);
    }

    public function testInstance()
    {
        $person = new Person("Murtaki", "sihab");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Murtaki", $person1->firstName);
        self::assertEquals("Murtaki", $person2->firstName);
        self::assertSame($person1, $person2);
    }

    public function testDepedency()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1, $bar2);
    }

    public function testInterfaceToClass()
    {
        // $this->app->singleton(HelloService::class, TestingService::class);

        $this->app->singleton(HelloService::class, function ($app) {
            return new TestingService();
        });

        $helloService = $this->app->make(HelloService::class);
        self::assertEquals('Halo Murtaki', $helloService->hello('Murtaki'));
    }
}

<?php


namespace App\Services;

use App\Services\HelloService;



class TestingService implements HelloService
{
    public function hello(string $name): string
    {
        return "Halo $name";
    }
}

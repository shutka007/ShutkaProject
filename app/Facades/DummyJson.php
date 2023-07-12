<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DummyJson extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dummyjson';
    }
}
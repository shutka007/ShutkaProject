<?php

namespace App\Providers;

use App\Services\DummyJsonService;
use GuzzleHttp\Client;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class DummyJsonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('dummyjson', function () {
            $client = new Client();
            return new DummyJsonService($client);
        });
    }
}
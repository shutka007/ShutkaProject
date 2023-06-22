<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Providers\UserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        
        // you can choose a different name
        Auth::provider('user', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
 
            return new UserProvider($app->make('user.connection'));
        });
    }
}

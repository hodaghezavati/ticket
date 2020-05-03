<?php

namespace App\Providers;


// use App\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;


// use App\Services\Auth\JwtGuard;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Closure Request Guards

        // Auth::viaRequest('custom-token', function ($request) {
        //     return User::where('token', $request->token)->first();
        // });

        //auth token
        // Auth::extend('jwt', function ($app, $name, array $config) {
        //     // Return an instance of Illuminate\Contracts\Auth\Guard...

        //     return new JwtGuard(Auth::createUserProvider($config['provider']));
        // });
    }
}

<?php

namespace App\Providers;

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

        
        Gate::define('adminpermission', function($user){
            return $user->hasRole('super-admin');
        });

        Gate::define('professionalpermission', function($user){
            return $user->hasRole('professional');
        });

        Gate::define('userpermission', function($user){
            return $user->hasRole('user');
        });

        Gate::define('guestpermission', function($user){
            return $user->hasRole('guest');
        });

    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-modules', function ($user) {            
            return $user->isMember || $user->isAdmin;
        });

        Gate::define('modify-users', function ($user) {
            return $user->isAdmin;
        });

        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });
        
        Gate::define('do', function ($user, $action) {
            // dump($action, $user);
            // return $user->group_id > 0 && $user->group_id <= 2;
            return false;
        });

    }
}

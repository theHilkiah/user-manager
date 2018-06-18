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
            return $user->group_id > 0 && $user->group_id <= 3;
        });

        Gate::define('modify-users', function ($user) {
            return $user->group_id == 1;
        });

        Gate::define('edit-settings', function ($user) {
            return $user->group_id > 0 && $user->group_id <= 2;
        });
    }
}

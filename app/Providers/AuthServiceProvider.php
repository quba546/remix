<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-level', function (User $user) {
            return $user->role_id === 0 // 0 for administrator
                ? Response::allow()
                : Response::deny('You must be administrator!');
        });

        Gate::define('moderator-level', function (User $user) {
            return $user->role_id <= 1  // 1 for moderator
                ? Response::allow()
                : Response::deny();
        });
    }
}

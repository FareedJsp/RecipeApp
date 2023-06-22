<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Ingredient;
use App\Policies\UserPolicy;
use App\Policies\IngredientPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Ingredient::class => IngredientPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('SuperAdmin') ? true : null;
        });

        Gate::define('isAdmin', function(User $user) {
            return $user->hasRole('Admin')
                ? Response::allow()
                : Response::deny('You must be an Administrator.');
        });
    }
}
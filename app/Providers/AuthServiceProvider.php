<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('Admin', function(User $user) {
            return $user->role == 'Admin';
        });
        Gate::define('Apoteker', function(User $user) {
            return $user->role == 'Apoteker';
        });
        Gate::define('Dokter', function(User $user) {
            return $user->role == 'Dokter';
        });
        Gate::define('Pasien', function(User $user) {
            return $user->role == 'Pasien';
        });
    }
}

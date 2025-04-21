<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate untuk mahasiswa
        Gate::define('isMahasiswa', function (User $user) {
            return $user->role && $user->role->nama_role === 'mahasiswa';
        });

        // Gate untuk kaprodi
        Gate::define('isKaprodi', function (User $user) {
            return $user->role && $user->role->nama_role === 'kaprodi';
        });

        // Gate untuk tata usaha
        Gate::define('isTataUsaha', function (User $user) {
            return $user->role && $user->role->nama_role === 'tata usaha';
        });

        // Gate untuk approve surat
        Gate::define('approve-surat', function (User $user) {
            return $user->role && 
                  ($user->role->nama_role === 'kaprodi' || 
                   $user->role->nama_role === 'tata usaha');
        });
    }
}
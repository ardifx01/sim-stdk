<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('akses-admin', function ($user) {
            // Kalau jabatannya anggota, lempar 404
            if ($user->jabatan === \App\Enums\JabatanEnum::Anggota) {
                // abort(404); // langsung not found
                return false;
            }
            if ($user->jabatan === \App\Enums\JabatanEnum::Tamu) {
                // abort(404); // langsung not found
                return false;
            }

            return true; // selain anggota boleh masuk
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Flash::levels([
            'success' => 'alert alert-success alert-dismissible fade show',
            'warning' => 'alert alert-warning alert-dismissible fade show',
            'error' => 'alert alert-danger alert-dismissible fade show',
        ]);
    }
}

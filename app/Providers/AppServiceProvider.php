<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
       

    // Já existe normalmente
    Route::middleware('api')
        ->prefix('api')
        ->group(base_path('routes/api.php'));

    // Adicione isto para seu novo arquivo
    Route::middleware('api')
        ->prefix('api/v2') // Use um prefixo único para evitar conflito
        ->group(base_path('routes/api.php'));
    }
}

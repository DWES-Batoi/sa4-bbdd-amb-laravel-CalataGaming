<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. Importar las clases nuevas
use App\Repositories\BaseRepository;
use App\Repositories\EquipRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 2. Añadir el binding (El "pegamento" de Laravel)
        $this->app->bind(BaseRepository::class, EquipRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
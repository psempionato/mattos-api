<?php

namespace App\Providers;

use App\Repositories\Contracts\EstrategiaWmsHorarioPrioridadeRepositoryInterface;
use App\Repositories\Contracts\EstrategiaWmsRepositoryInterface;
use App\Repositories\EstrategiaWmsHorarioPrioridadeRepository;
use App\Repositories\EstrategiaWmsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EstrategiaWmsRepositoryInterface::class, EstrategiaWmsRepository::class);
        $this->app->bind(EstrategiaWmsHorarioPrioridadeRepositoryInterface::class, EstrategiaWmsHorarioPrioridadeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

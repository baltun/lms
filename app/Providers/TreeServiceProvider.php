<?php

namespace App\Providers;

use App\Interfaces\TreeServiceInterface;
use App\Services\TreeServiceAdjacencyListService;
use Illuminate\Support\ServiceProvider;

class TreeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(TreeServiceInterface::class, TreeServiceAdjacencyListService::class);
    }
}

<?php

namespace App\Providers;

use App\Models\Kampus;
use App\Repositories\KampusRepository;
use Illuminate\Support\ServiceProvider;

class KampusRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KampusRepository::class, function(){
            return new KampusRepository(new Kampus());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

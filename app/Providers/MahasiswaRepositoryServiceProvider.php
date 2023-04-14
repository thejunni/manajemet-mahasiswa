<?php

namespace App\Providers;

use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;
use Illuminate\Support\ServiceProvider;

class MahasiswaRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MahasiswaRepository::class, function (){
            return new MahasiswaRepository(new Mahasiswa());
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

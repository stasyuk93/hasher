<?php

namespace App\Services\Hasher;

use Illuminate\Support\ServiceProvider;

class HasherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('hasher', Hasher::class);
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

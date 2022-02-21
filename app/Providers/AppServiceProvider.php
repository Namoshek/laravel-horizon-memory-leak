<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Stopwatch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::after(function () {
            /** @var Stopwatch $stopwatch */
            $stopwatch = $this->app->make(Stopwatch::class);

            Log::debug('Stopwatch', ['timers' => count($stopwatch->timers)]);
        });
    }
}

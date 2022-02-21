<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;

class SecondJob implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('The second job is started.');

        Bus::dispatchSync(new ThirdJob());
        Bus::dispatchSync(new ThirdJob());

        Log::debug('The second job is finished.');
    }
}

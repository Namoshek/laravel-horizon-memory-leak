<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ThirdJob implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('The third job is run.');
    }
}

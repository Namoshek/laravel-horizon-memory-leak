<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class FirstJob implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('The first job is run.');
    }
}

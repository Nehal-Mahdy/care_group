<?php

namespace App\Listeners;

use App\Bootstrap\Application;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BootstrapApplication
{
    private Application $bootstrapper;
    /**
     * Create the event listener.
     */
    public function __construct(Application $application)
    {
        $this->bootstrapper = $application;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $this->bootstrapper->bootstrap();
    }
}

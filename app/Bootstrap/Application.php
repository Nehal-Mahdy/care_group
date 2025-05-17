<?php

namespace App\Bootstrap;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class Application
{
    protected array $bootstrappers = [
        Permissions::class,
        Roles::class,
    ];

    public function bootstrap(): void
    {
        //Artisan::call('jwt:secret', [], $this->getOutput());
        foreach ($this->bootstrappers as $bootstrapper) {
            App::make($bootstrapper)->bootstrap();
        }
    }

    protected function getOutput(): \Symfony\Component\Console\Output\OutputInterface
    {
        return new \Symfony\Component\Console\Output\ConsoleOutput();
    }
}

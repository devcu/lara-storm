<?php namespace Laralips\Storm\Foundation\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The bootstrap classes for the application.
     *
     * @var string[]
     */
    protected $bootstrappers = [
        \Laralips\Storm\Foundation\Bootstrap\RegisterClassLoader::class,
        \Laralips\Storm\Foundation\Bootstrap\LoadEnvironmentVariables::class,
        \Laralips\Storm\Foundation\Bootstrap\LoadConfiguration::class,
        \Laralips\Storm\Foundation\Bootstrap\LoadTranslation::class,

        \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
        \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
        \Illuminate\Foundation\Bootstrap\SetRequestForConsole::class,

        \Laralips\Storm\Foundation\Bootstrap\RegisterWinter::class,

        \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
        \Illuminate\Foundation\Bootstrap\BootProviders::class,
    ];

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $this->bootstrap();
        $this->app['events']->dispatch('console.schedule', [$schedule]);
    }
}

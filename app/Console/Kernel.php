<?php

namespace App\Console;

use App\Console\Commands\CommandMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
  /**
     * Define the application's command schedule.
     *
     * @param  IlluminateConsoleSchedulingSchedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
            {
                $schedule->command('app:command-mail')->daily();
            }

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $command=[CommandMail::class];
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('test:apstatus')->cron('0 * * * *')->runInBackground();
        $schedule->command('test:apstatus')->cron('15 * * * *')->runInBackground();
        $schedule->command('test:apstatus')->cron('30 * * * *')->runInBackground();
        $schedule->command('test:apstatus')->cron('45 * * * *')->runInBackground();
        $schedule->command('test:apdetail')->dailyAt('18:00')->runInBackground();
        $schedule->command('apeh:daily')->dailyAt('21:00')->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;


use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('salary:create')->monthly();
        $schedule->command('attendance:create')->dailyAt('18:00'); // chạy tác vụ này vào mỗi ngày lúc 17:30
        $schedule->command('salarycalculation:update')->dailyAt('18:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

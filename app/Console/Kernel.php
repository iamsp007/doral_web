<?php

namespace App\Console;

use App\Jobs\CheckCurrentCaregiver;
use App\Jobs\PatientImport;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('send:dueReportNotification')->timezone('America/New_York')->at('23:59');

        $company='';
        if(Auth::guard('referral')) {
            $company = Auth::guard('referral')->user();
        } 
        $schedule->job(new PatientImport($company))->timezone('America/New_York')->at('23:59');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

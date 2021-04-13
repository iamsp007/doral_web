<?php

namespace App\Console;

use App\Models\ApiRequest;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ApiRequestCron::class,
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
        // $schedule->command('ApiRequest:cron')->everyMinute();
         /* Get all tasks from the database */
        $apiRequests = ApiRequest::all();
        foreach ($apiRequests as $apiRequest) {
            
            $frequency = $apiRequest->schedule;
            $extra_schedule = $apiRequest->extra_schedule;
            $extra_schedule1 = explode(",", $extra_schedule);
            log::info($extra_schedule);
            // $scheduleData = '';
            if ($frequency === '1') {
                $schedule->command('ApiRequest:cron')->dailyAt('24:00')->timezone('America/New_York');
            } elseif ($frequency === '2') {
                // $extra_schedule = strtoupper($extra_schedule);
                foreach ($extra_schedule1 as $key => $value) {
                    
                    log::info($value);
                    
                }
                // $scheduleData = 'days([Schedule::'.$value.', Schedule::'.$value.'],"24:00")';
                // log::info($scheduleData);
                // $scheduleData = 'twiceWeekly('.$extra_schedule.',"24:00")';
            
                // $scheduleData = "everyMinute";
                $schedule->command('ApiRequest:cron')->twiceWeekly($extra_schedule,"24:00")->timezone('America/New_York');
            } else if ($frequency === '3') {
                $scheduleData = 'twiceMonthly('.$extra_schedule.',"24:00")';
                $schedule->command('ApiRequest:cron')->$scheduleData->timezone('America/New_York');
            } else if ($frequency === '4') {
                $schedule->command('ApiRequest:cron')->quarterly()->timezone('America/New_York');;
            }
        }
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

<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;
use Illuminate\Support\Facades\Log;

class testQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $doral_id = createDoralId();
        $password = str_replace(" ", "",'manisha-queue-test') . '@' . $doral_id;

        $user = new User();
        $user->first_name = 'manisha-queue-test';
        $user->last_name = 'manisha-queue-test';
        $user->password = setPassword($password);
        $user->phone = '2323232323';
        // $user->home_verified_at = now();

        $user->gender = '2';
        
        // $user->date_of_birth = dateFormat($demographics['BirthDate']);
        // $user->tele_phone = setPhone($demographics['Phone2']);
        $user->save();
    }

     /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        log::info($exception);
    }
}

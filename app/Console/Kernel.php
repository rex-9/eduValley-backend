<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Ad;
use Carbon\Carbon;

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
        $schedule->call(function () {
            foreach (Ad::all() as $ad) {
                if (Carbon::now('Asia/Yangon')->format("Y-m-d") == $ad->expire) {
                    $ad->serial = 0;
                    $ad->name = "null";
                    $ad->site = "null";
                    $ad->expire = "expired";
                    $result = $ad->save();
                    if ($result) {
                        return ["killed this one" => $ad];
                    } else {
                        return ["error"];
                    }
                }
            }
        })->everyMinute();
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

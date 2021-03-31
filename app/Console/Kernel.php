<?php

namespace App\Console;

use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

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
     * @param  Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 0 0 * * *
        // php74 /path/to/app/artisan schedule:run >> /dev/null 2>&1
        $schedule->call(function () {
            $temporaryFiles = TemporaryFile::where('created_at', '<', Carbon::now()->subMinutes(15))->get();
            foreach ($temporaryFiles as $temporaryFile) {
                if (Storage::deleteDirectory('public/tmp/' . $temporaryFile->folder)) {
                    $temporaryFile->delete();
                }
            }
        })->daily();
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

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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $temporaryFiles = TemporaryFile::where('created_at', '<', Carbon::now()->subMinutes(15))->get();
            foreach ($temporaryFiles as $temporaryFile) {
                if (Storage::deleteDirectory('public/tmp/' . $temporaryFile->folder)) {
                    $temporaryFile->delete();
                    //$out->writeln('Deleted: ' . $temporaryFile->folder . ' | Time: ' . Carbon::now());
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

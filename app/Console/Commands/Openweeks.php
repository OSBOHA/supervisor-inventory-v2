<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\api\WeekController;


class Openweeks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'open:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'open new week in the system on weekly on Sunday at midnight';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new WeekController();
        $controller->create();

        return 0;
    }
}

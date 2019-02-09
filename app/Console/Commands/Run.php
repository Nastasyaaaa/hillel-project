<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Run extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create tables and seed database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        \Illuminate\Support\Facades\Artisan::call('db:seed');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts the application by migrating and seeding the database, then launching the server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate');

        $this->call('db:seed');

        $this->call('cache:clear');
        $this->call('config:clear');

        $this->info("Starting queue worker in the background...");
        exec('php artisan queue:work &');

        $this->info("Starting Laravel development server...");
        exec('php artisan serve');
    }
}

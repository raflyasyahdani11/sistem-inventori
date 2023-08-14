<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init {--prod}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $isProduction = $this->option('prod');

        if (!$isProduction) {
            $this->call('migrate:refresh');
            $this->call('db:seed');
            $this->call('app:check-expired-items');
        } else {
            $this->call('migrate:refresh');
            $this->call('db:seed');
        }
    }
}

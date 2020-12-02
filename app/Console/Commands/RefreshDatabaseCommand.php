<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refreshdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk merefresh database dan menjalankan seeder';

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
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:refresh');

        //seeder
        $this->call('db:seed');

        
        $this->info('Berhasil refresh database dan menjalankan seeder');
    }
}

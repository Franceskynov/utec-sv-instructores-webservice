<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class InstallAppliction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'application:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando instala la applicacion';

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
        $this->migrate();
        $this->seed();
    }

    /**
     *
     */
    private function migrate()
    {
        $this->line('Migrando las tablas...');
        $this->call('migrate');
    }

    /*
     *
     */
    private function seed()
    {
        $this->line('Instalando los registros iniciales');
        $this->call('db:seed');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Client;
use Illuminate\Console\Command;

class Custom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:td';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carga de Tablas y Datos Predefinidos';

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
        
        City::factory(30)->create();
        Client::factory(50)->create();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\infos;
use Illuminate\Support\Facades\Hash;

class makeAPIkey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $infos = infos::find(1);
        $infos->mobile_api_private = uniqid();
        $infos->mobile_api_public = Hash::make($infos->mobile_api_private);
        $infos->save();
        $this->info("API key generated");
        $this->info("public key: ".$infos->mobile_api_public);
        return 0;
    }
}

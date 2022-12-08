<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AppConnectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('app_connections')->insert([
            [
                'user_id' => '2',
                'app_name' => 'Canwe',
                "app_url" => 'https://canwe.io',
                "api_public" => Hash::make('234324234'),
                "api_private"=>"234324234"
            ],
        ]);
    }
}

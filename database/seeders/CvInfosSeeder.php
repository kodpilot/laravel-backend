<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CvInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cv_infos')->insert([
            [
                'name' => "Developer",
                'description' => "code mode",
                "file" => "example.png",
                'user_id' => 1,
            ],
            [
                'name' => "Designer",
                "description" => "design mesign",
                "file" => "example.png",
                'user_id' => 1,
            ],
        ]);
    }
}

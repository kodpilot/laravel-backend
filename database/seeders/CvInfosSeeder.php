<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\cv_infos;

class CvInfosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "Developer",
                'description' => "code mode",
                "file" => "example.png",
                "video" => "example.mp4",
                'user_id' => 1,
            ],
            [
                'name' => "Designer",
                "description" => "design mesign",
                "file" => "example.png",
                "video" => "example.mp4",
                'user_id' => 2,
            ],
        ];
        foreach ($data as $key) {
            cv_infos::create($key);
        }
    }
}

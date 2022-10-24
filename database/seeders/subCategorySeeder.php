<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class subCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = '1';
        $file = 'example.png';

        \DB::table('sub_categories')->insert([
            
        ]);
    }
}

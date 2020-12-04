<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Giyim',
            'slug' => 'giyim',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Bilgisayar',
            'slug' => 'bilgisayar',
        ]);
    }
}

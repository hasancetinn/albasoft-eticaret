<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Apple',
            'description' => ', dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.',
            'slug' => 'apple',
            'category_id' => '3',
            'picture' => '1606983648.jpeg',
            'price' => '33.32',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Asus',
            'description' => ', dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.',
            'slug' => 'asus',
            'category_id' => '3',
            'picture' => '1606983648.jpeg',
            'price' => '23.32',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Lenovo',
            'description' => ', dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.',
            'slug' => 'lenovo',
            'category_id' => '3',
            'picture' => '1606983648.jpeg',
            'price' => '13.32',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Kablo',
            'description' => ', dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.',
            'slug' => 'kablo',
            'category_id' => '1',
            'picture' => '1606983648.jpeg',
            'price' => '7.32',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Kazak',
            'description' => ', dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.',
            'slug' => 'kazak',
            'category_id' => '2',
            'picture' => '1606983648.jpeg',
            'price' => '5.32',
        ]);
    }
}

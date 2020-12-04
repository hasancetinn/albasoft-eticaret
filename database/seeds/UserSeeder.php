<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Hasan çetin',
            'email' => 'cetinn.hsnn@gmail.com',
            'phone' => '123',
            'user_role' => '1',
            'password' => Hash::make('123123123')
        ]);

        DB::table('users')->insert([
            'name' => 'Mehmet Akça',
            'email' => 'akca@gmail.com',
            'phone' => '123',
            'user_role' => '2',
            'password' => Hash::make('123123123')
        ]);
    }
}

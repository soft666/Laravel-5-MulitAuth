<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('customers')->insert([
            'name' => 'Customers',
            'email' => 'xxxxx@gmail.com',
            'password' => \Hash::make('1234'),
        ]);

        \DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'xxxxx@gmail.com',
            'password' => \Hash::make('1234'),
        ]);
    }
}

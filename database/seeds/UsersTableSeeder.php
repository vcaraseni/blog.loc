<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Peter',
                'email' => 'peter@gmail.com',
                'password' => bcrypt('admin123'),
                'remember_token' => str_random(15)
            ],
            [
                'name' => 'John',
                'email' => 'john@gmail.com',
                'password' => bcrypt('secret'),
                'remember_token' => str_random(15)
            ],
            [
                'name' => 'Maria',
                'email' => 'maria@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(15)
            ]
        ]);
    }
}

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
            'id' => 1,
            'email' => 'alex@gmail.com',            
            'password' => '12345'                               
            ],
            [            
            'id' => 2,
            'email' => 'ivan@gmail.com',
            'password' => '123456'
            ],
        ]);
    }
}

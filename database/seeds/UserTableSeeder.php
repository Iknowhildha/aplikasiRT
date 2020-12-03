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
        DB::table('users')->insert(array(['username' =>'admin', 'email' => 'admin@gmail.com','password'=>'admin123', 'level' => 'Admin']));    
    }
}

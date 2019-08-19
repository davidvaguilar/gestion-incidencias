<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'David Villegas',
          'email' => 'david.villegas.aguilar@gmail.com',
          'password' => bcrypt('123123'),
          'role' => 0
        ]);



        User::create([
          'name' => 'Maria',
          'email' => 'cliente@gmail.com',
          'password' => bcrypt('123123'),
          'role' => 2
        ]);
    }
}

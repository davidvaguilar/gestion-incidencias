<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ //3
          'name' => 'Soporte S1',
          'email' => 'soporte1@gmail.com',
          'password' => bcrypt('123123'),
          'role' => 1
        ]);

        User::create([
          'name' => 'Soporte S2',
          'email' => 'soporte2@gmail.com',
          'password' => bcrypt('123123'),
          'role' => 1
        ]);
    }
}

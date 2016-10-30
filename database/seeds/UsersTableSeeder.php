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
          'firstName' => str_random(10),
          'lastName' => str_random(10),
          'streetName' => str_random(10),
          'houseNumber' => str_random(10),
          'city' => str_random(10),
          'country' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'password' => bcrypt('secret')
      ]);
    }
}

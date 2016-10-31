<?php

use Illuminate\Database\Seeder;

class ContestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contests')->insert([
          'name' => 'Battlefield 1',
          'description' => 'Quiz over de WW1',
      ]);
    }
}

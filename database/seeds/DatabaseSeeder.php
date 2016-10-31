<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(ContestTableSeeder::class);
        DB::table('contests')->insert([
            'name' => 'World of Warcraft',
            'description' => 'Are you addicted enough to know the answers to these questions?',
        ]);
    }
}

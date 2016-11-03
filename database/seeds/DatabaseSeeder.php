<?php

use Illuminate\Database\Seeder;
use App\User;

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
        DB::table('roles')->insert([
            'name' => 'administrator'
        ]);

        DB::table('roles')->insert([
            'name' => 'member'
        ]);

        DB::table('users')->insert([
            'firstName' => 'Steven',
            'lastName' => 'Serrien',
            'streetName' => 'Lijsterbessenweg',
            'houseNumber' => '82',
            'city' => 'Hove',
            'country' => 'Belgium',
            'email' => 's.serrien@gmail.com',
            'password' => bcrypt('test123')
        ]);

        $user = User::where('firstName', 'Steven')->with('roles')->attach(1);


    }
}

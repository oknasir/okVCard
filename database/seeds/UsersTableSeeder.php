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
        App\User::create([
            'name' => 'Nasir Mehmood',
            'username' => 'oknasir',
            'email' => 'oknasir@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

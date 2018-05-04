<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Para criar um user.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'      => 'Walace Santana',
        	'email'     => 'walace.sant@hotmail.com',
        	'password'  =>  bcrypt('nocoru84'),
        ]);
    }
}

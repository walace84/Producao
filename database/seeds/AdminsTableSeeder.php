<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Para criar um administrador.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'name'      => 'Walace Santana',
        	'email'     => 'walace.sant@hotmail.com',
        	'password'  =>  bcrypt('nocoru84'),
        ]);
    }
}

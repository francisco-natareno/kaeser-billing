<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Francisco',
            'last_name' => 'De León',
            'sap_user' => 'DELEON1',
        	'email' => 'francisco.deleon@kaeser.com',
        	'password' => Hash::make('58577092')
        ]);

        User::create([
            'first_name' => 'Omar',
            'last_name' => 'Diéguez',
            'sap_user' => 'DIEGUEZ1',
        	'email' => 'omar.dieguez@kaeser.com',
        	'password' => Hash::make('DIEGUEZ1')
        ]);

        User::create([
            'first_name' => 'Edgar',
            'last_name' => 'Chacón',
            'sap_user' => 'CHACON1',
        	'email' => 'edgar.chacon@kaeser.com',
        	'password' => Hash::make('CHACON1')
        ]);

        User::create([
            'first_name' => 'Michelle',
            'last_name' => 'Guerra',
            'sap_user' => 'GUERRA1',
        	'email' => 'michelle.guerra@kaeser.com',
        	'password' => Hash::make('GUERRA1')
        ]);
    }
}
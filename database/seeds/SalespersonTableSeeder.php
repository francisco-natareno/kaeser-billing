<?php

use Illuminate\Database\Seeder;
use App\Salesperson;

class SalespersonTableSeeder extends Seeder
{
    public function run()
    {
        Salesperson::create([
            'salesperson_id' => '3504',
            'first_name' => 'Juan',
            'last_name' => 'Marroquín'
        ]);

        Salesperson::create([
            'salesperson_id' => '3512',
            'first_name' => 'Abel',
            'last_name' => 'López'
        ]);

        Salesperson::create([
            'salesperson_id' => '3520',
            'first_name' => 'Omar',
            'last_name' => 'Diéguez'
        ]);

        Salesperson::create([
            'salesperson_id' => '3528',
            'first_name' => 'Gregorio',
            'last_name' => 'Chávez'
        ]);

        Salesperson::create([
            'salesperson_id' => '3554',
            'first_name' => 'Miguel',
            'last_name' => 'Antillón'
        ]);
    }
}
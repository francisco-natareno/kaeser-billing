<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(SalespersonTableSeeder::class);
    }
}
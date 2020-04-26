<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::firstWhere('email', 'francisco.deleon@kaeser.com');
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();  
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
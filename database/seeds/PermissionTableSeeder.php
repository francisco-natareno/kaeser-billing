<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'contracts-show',
            'contract-create',
            'contract-edit',
            'contract-destroy',
            'files-show',
            'file-upload',
            'file-destroy',
            'invoices-show',
            'invoice-transfer',
            'invoice-cancel',
            'orders-show',
            'order-create',
            'order-edit',
            'order-destroy',
            'roles-show',
            'role-create',
            'role-edit',
            'role-destroy',
            'users-show',
            'user-create',
            'user-edit',
            'user-destroy',
            'upload',
         ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
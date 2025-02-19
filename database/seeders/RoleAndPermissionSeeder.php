<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminPermission= [
            'access.admin',
            'view.users','create.users','edit.users','delete.users',
            'view.roles','create.roles','edit.roles','delete.roles',
            'edit.permissions','manage.products','manage.categories',
            'view.orders','update.orders'
        ];

        foreach($adminPermission as $permission){
            ModelsPermission::create(['name' => $permission]);
        }
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($adminPermission);
        $customerPermission= [
            'view.products','place.orders','view.own.orders', 'cancel.own.orders',
            'edit.own.profile'
        ];
        foreach($customerPermission as $permission){
            ModelsPermission::create(['name' => $permission]);
        }
        $customerRole = Role::create(['name' => 'customer']);
        $customerRole->syncPermissions($customerPermission);
    }
}

<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        $expert_permissions = Permission::whereBetween('id', array(17,41));
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        Role::findOrFail(2)->permissions()->sync($expert_permissions->pluck('id'));
    }
}

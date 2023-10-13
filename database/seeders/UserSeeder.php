<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    public function run()
    {
        Admin::truncate();
        $admin = Admin::updateOrCreate([
            'name' => 'Admin',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
            'status'=>'enable'
        ]);
        //DB::table('role_has_permissions')->truncate();
        //DB::table('model_has_roles')->truncate();
      //Role::truncate();
        $role = Role::updateOrCreate(['name'=>'super_admin','guard_name'=>'admin']);
        $permissions = Permission::get()->pluck('id');
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}

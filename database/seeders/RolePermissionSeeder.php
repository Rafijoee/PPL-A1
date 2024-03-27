<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\Type\VoidType;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Whoops\Run;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => '']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'petani']);
        Role::create(['name' => 'penyuluh']);
        Role::create(['name' => 'pemerintah']);

        $admin = Role::findByName('admin');
    }

}

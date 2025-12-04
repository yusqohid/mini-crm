<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => PermissionEnum::MANAGE_USERS->value]);
        Permission::firstOrCreate(['name' => PermissionEnum::DELETE_CLIENTS->value]);
        Permission::firstOrCreate(['name' => PermissionEnum::DELETE_PROJECTS->value]);
        Permission::firstOrCreate(['name' => PermissionEnum::DELETE_TASKS->value]);

        $role = Role::findByName('admin');
        $role->givePermissionTo([
            PermissionEnum::MANAGE_USERS->value,
            PermissionEnum::DELETE_CLIENTS->value,
            PermissionEnum::DELETE_PROJECTS->value,
            PermissionEnum::DELETE_TASKS->value,
        ]);
    }
}

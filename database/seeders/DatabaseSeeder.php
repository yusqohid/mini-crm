<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Admin admin',
            'email' => 'admin@admin.com',
            'password' => '12345678'
        ])->syncRoles('admin');
    }
}

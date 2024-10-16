<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);

        User::factory()->create([
            'name' => 'Admin Dev',
            'email' => 'admin@dev.com',
            'password' => bcrypt('password'),
        ])->assignRole($roleAdmin);
    }
}

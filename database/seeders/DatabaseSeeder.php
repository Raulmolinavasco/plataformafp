<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user2 = User::factory()->create([
            'name' => 'Raul',
            'email' => 'rmolina@educa.jcyl.e@gmail.com',
            'password' => Hash::make('Infernal1$'),
        ]);
        $role = Role::create(['name' => 'Admin']);
        $user1->assignRole($role);
        $user2->assignRole($role);
    }
}

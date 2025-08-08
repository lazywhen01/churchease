<?php

namespace Database\Seeders;

use App\Enum\User\RolesEnum;
use App\Models\Core\Church\Church;
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

        $superAdminRole = Role::create(['name' => RolesEnum::SuperAdmin->value]);
        $churchRole = Role::create(['name' => RolesEnum::ChurchAdmin->value]);
        $userRole = Role::create(['name' => RolesEnum::User->value]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@test.com',
            'password' => Hash::make('12345678'),
        ])->assignRole(RolesEnum::SuperAdmin);

        Church::factory(1)->create();

        $this->call([
            ChurchAdminRoleSeeder::class,
            ChurchUserSeeder::class,
            SuperAdminRoleSeeder::class,
        ]);
    }
}

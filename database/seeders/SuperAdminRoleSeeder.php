<?php

namespace Database\Seeders;

use App\Models\User;

use App\Enum\User\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->superAdminRole()->create()->each->assignRole(RolesEnum::SuperAdmin);
    }
}

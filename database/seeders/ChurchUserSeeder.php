<?php

namespace Database\Seeders;

use App\Enum\User\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChurchUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Church Admin',
            'email' => 'churchadmin@test.com',
            'password' => Hash::make('12345678'),
        ])->assignRole(RolesEnum::ChurchAdmin->value);
    }
}

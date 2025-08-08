<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

test('guests are redirected to the login page', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
     $roleName = 'Super Admin';

    $role = Role::firstOrCreate(['name' => $roleName]);

    $user = User::factory()->create(['email_verified_at' => now()]);
    $user->assignRole($role);

    $this->actingAs($user, 'web')
         ->get('/dashboard')
         ->assertOk();
});

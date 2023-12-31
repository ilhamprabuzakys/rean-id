<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin 1',
            'email' => 'superadmin@rean.id',
            'username' => 'superadmin',
            'role' => 'superadmin',
            'password' => \bcrypt('superadmin'),
            'email_verified_at' => now(),
            'avatar' => 'assets/img/avatar/avatar-1.png',
        ]);
        User::create([
            'name' => 'Super Admin 2',
            'email' => 'superadmin2@rean.id',
            'username' => 'superadmin2',
            'role' => 'superadmin',
            'password' => \bcrypt('superadmin'),
            'email_verified_at' => now(),
            'avatar' => 'assets/img/avatar/avatar-1.png',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@rean.id',
            'username' => 'admin',
            'role' => 'admin',
            'password' => \bcrypt('admin'),
            'email_verified_at' => now(),
            'avatar' => 'assets/img/avatar/avatar-1.png',
        ]);
        User::create([
            'name' => 'Member 1',
            'email' => '1.member@rean.id',
            'username' => 'member',
            'role' => 'member',
            'password' => \bcrypt('member'),
            'email_verified_at' => now(),
            'avatar' => 'assets/img/avatar/avatar-1.png',
        ]);
    }
}

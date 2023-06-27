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
            'name' => 'Admin',
            'email' => 'admin@rean.id',
            'username' => 'admin',
            'role' => 'admin',
            'password' => \bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Super Admin 1',
            'email' => 'superadmin@rean.id',
            'username' => 'superadmin',
            'role' => 'superadmin',
            'password' => \bcrypt('superadmin'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Super Admin 2',
            'email' => 'superadmin2@rean.id',
            'username' => 'superadmin2',
            'role' => 'superadmin',
            'password' => \bcrypt('superadmin'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Member 1',
            'email' => '1.member@rean.id',
            'username' => 'member',
            'role' => 'member',
            'password' => \bcrypt('member'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Biasa',
            'email' => 'biasa@rean.id',
            'username' => 'biasa',
            'role' => 'biasa',
            'password' => \bcrypt('biasa'),
            'email_verified_at' => now(),
        ]);
    }
}

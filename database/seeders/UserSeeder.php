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
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'password' => \bcrypt('admin')
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'role' => 'superadmin',
            'password' => \bcrypt('superadmin')
        ]);
        User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'username' => 'member',
            'role' => 'member',
            'password' => \bcrypt('member')
        ]);
        User::create([
            'name' => 'Biasa',
            'email' => 'biasa@gmail.com',
            'username' => 'biasa',
            'role' => 'biasa',
            'password' => \bcrypt('biasa')
        ]);
    }
}

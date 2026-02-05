<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // creating an admin user and checking if it already exists
        if (!User::where('email', 'admin@roots.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@roots.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]);
        }
    }
}
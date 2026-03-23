<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder {
    // Need a default admin user
    public function run(): void {
        // Creating an admin user
        if (!User::where('email', 'admin@roots.com')->exists()) {
            // Default credentials for admin user
            User::create([
                'forename' => 'Admin',
                'surname' => 'User',
                'email' => 'admin@roots.com',
                'password' => Hash::make('password'), // Change this to a secure password on the website
                'role' => 'admin',
                'is_active' => true,
                'change_password' => true, // Forces password change at first login
            ]);
        }
    }
}
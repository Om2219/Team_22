<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class Accountseeder1 extends Seeder {
    
    public function run(): void {
        // Needed to prevent duplicates
        if (!User::where('email', 'Certified@product.com')->exists()) {
            User::create([
                'forename' => 'Certified',          //creates a seeded account
                'surname' => 'Product',
                'email' => 'Certified@product.com', 
                'password' => Hash::make('CertifiedProduct'),
            ]);

            User::create([
                'forename' => 'Hello',          //creates a seeded account
                'surname' => 'Buddy',
                'email' => 'hellobuddy@roots.com', 
                'password' => Hash::make('HelloBuddy1!'),
            ]);
        }
    }
}
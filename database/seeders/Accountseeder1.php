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
                'email' => 'Certified@product.com', 
                'password' => Hash::make('CertifiedProduct'),
            ]);
        }
    }
}

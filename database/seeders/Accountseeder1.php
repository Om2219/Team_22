<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class Accountseeder1 extends Seeder
{
    
    public function run(): void
    {
        // need to prevent duplicates
        if (!User::where('email', 'Certified@product.com')->exists()) {
            User::create([
                'email' => 'Certified@product.com', //creates a seeded account, didn't apply a name because it's nullable
                'password' => Hash::make('CertifiedProduct'),
            ]);
        }
    }
}

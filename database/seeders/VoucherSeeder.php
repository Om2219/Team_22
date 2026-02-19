<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
  
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    DB::table('vouchers')->upsert([
        [
            'code' => 'SAVE10',
            'type' => 'percent',
            'value' => 10,
            'min_spend' => 20,
            'expires_at' => null,
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'code' => 'FIVEOFF',
            'type' => 'fixed',
            'value' => 5,
            'min_spend' => null,
            'expires_at' => null,
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'code' => 'MONKEY',
            'type' => 'percent',
            'value' => 90,
            'min_spend' => 20,
            'expires_at' => null,
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ],
    ['code'],
    ['type', 'value', 'min_spend', 'expires_at', 'active', 'updated_at']
    );
}

}

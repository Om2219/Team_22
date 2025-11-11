<?php

// This file is part of the Database\Seeders namespace
namespace Database\Seeders;

use Illuminate\Database\Seeder; // This is the base Seeder class that all seeders extend

// @todo: Add comments. What is this class responsible for?
class DatabaseSeeder extends Seeder
{
    /**
     * @todo: Add comments. What is this function responsible for?
     *
     * @todo: What artisan command(s) can be used to run this function?
     *     
     */
    public function run(): void
    {
        // @todo: Add comments to explain what the call() method does.
        // @todo: What parameters does it accept?
        // @todo: Does the order of the contents of the function matter?
        $this->call([
            StudentSeeder::class, 
            ModuleSeeder::class, 
        ]);
    }
}

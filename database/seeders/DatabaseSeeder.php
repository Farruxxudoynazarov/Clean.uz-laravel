<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
         ]);

    }
}

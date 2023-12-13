<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Web Design']);
        Category::create(['name' => 'Web Developmen']);
        Category::create(['name' => 'Online Marketing']);
        Category::create(['name' => 'Keyword Research']);
        Category::create(['name' => 'Email Maketing']);
    }
}

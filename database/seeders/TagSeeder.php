<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Design']);
        Tag::create(['name' => 'Marketing']);
        Tag::create(['name' => 'SEO']);
        Tag::create(['name' => 'Writing']);
        Tag::create(['name' => 'Consulting']);
        Tag::create(['name' => 'Development']);
        Tag::create(['name' => 'Reading']);
}



}

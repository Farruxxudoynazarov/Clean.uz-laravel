<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Sarlavha',
            'short_content' => 'Qisqa mazmuni',
            'content' => 'MIsollar uchun',
            'photo' => null,
        ]);

        Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Sarlavha',
            'short_content' => 'Qisqa mazmuni',
            'content' => 'MIsollar uchun',
            'photo' => null,
        ]);
    }
}

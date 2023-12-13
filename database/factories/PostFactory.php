<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
// use Database\Factories\fake;
use Illuminate\Foundation\Testing\WithFaker;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    use WithFaker;

 

  
    
    
        public function definition(): array
        {
            return [
                'user_id' => 1,
                'category_id' => rand(1,5),
                'title' => $this->faker->sentence(),
                'short_content'=>$this->fake()->sentence(15),
                'content' =>$this->fake()->paragraph(15),
            ];
        }
    
    
    
}

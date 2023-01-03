<?php

namespace Database\Factories;


use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
        protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(9, true),
            'slug' => $this->faker->slug,
            'is_active' => $this->faker->boolean,
            'user_id' => rand(1, 10)
        ];
    }
}

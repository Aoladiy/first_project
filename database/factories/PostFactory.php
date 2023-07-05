<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'content' => $this->faker->text,
            'likes' => random_int(0, 100000),
            'image' => $this->faker->imageUrl(category: 'cats'),
            'is_published' => random_int(0, 1),
            'category_id' => random_int(0, 50),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => substr($this->faker->sentence(2), 0, -1),
            'slug' => $this->faker->slug(3),
            'content' => $this->faker->paragraph,
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create(),
        ];
    }
}

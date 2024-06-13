<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = $this->faker->sentence(7);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->realTextBetween(),
            'content' => $this->faker->paragraphs(6, true),
            'category_id' => random_int(1, 3),
            'tag_id' => random_int(1,3),
            'user_id' => 1,
            'is_published' => true,
            'views' => rand(0, 100000)
        ];
    }
}

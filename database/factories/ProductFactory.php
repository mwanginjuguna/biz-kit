<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productImages = Storage::disk('public')->files('products');

        $name = $this->faker->sentence(5);

        $productCategories = ['Clothing', 'Phones', 'Electronics', 'Fitness', 'Fashion', 'Food'];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(4, true),
            'category' => Arr::random($productCategories),
            'price' => $this->faker->randomFloat(2, 3, 200),
            'stock_quantity' => $this->faker->randomNumber(),
            'image' => Arr::random($productImages),
        ];
    }
}

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
        $productBrands = ['Gucci', 'Mamba', 'Afrikana', 'Simba', 'Tesla', 'Sony'];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(4, true),
            'category' => Arr::random($productCategories),
            'brand' => Arr::random($productBrands),
            'price' => $this->faker->randomFloat(2, 3, 200),
            'stock_quantity' => $this->faker->randomNumber(),
            'return_policy' => Arr::random(['30 days', '3 days', '7 days', '14 days']),
            'shipped_from' => $this->faker->city(),
            'image' => Arr::random($productImages),
        ];
    }
}

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

        // sample product categories
        $productCategories = ['Clothing', 'Phones', 'Electronics', 'Fitness', 'Fashion',
            'Food', 'Computing', 'Energy', 'Cars', 'Entertainment', 'Agriculture'];

        // Sample Product brands
        $productBrands = ['Gucci', 'Mamba', 'Afrikana', 'Simba', 'Tesla', 'Sony',
            'Maara', 'Savannah', 'Maasai', 'Safaricom', 'Tesla', 'Meta', 'Alibaba',
            'Amazon', 'Wakanda', 'Lion', 'Puma', 'Toyota', 'Rasta', 'Apple', 'Google',
            'Samsung', 'Huawei', 'Xiaomi', 'Hp'];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(4, true),
            'category' => Arr::random($productCategories),
            'brand' => Arr::random($productBrands),
            'price' => $this->faker->randomFloat(2, 250, 3200),
            'stock_quantity' => rand(0, 52),
            'return_policy' => Arr::random(['30 days', '3 days', '7 days', '14 days']),
            'shipped_from' => $this->faker->city(),
            'image' => Arr::random($productImages),
            'views' => rand(0, 150)
        ];
    }
}

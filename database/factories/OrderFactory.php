<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user,
            'order_number' => strtoupper(Str::random(11)),
            'customer_name' => $user->name,
            'customer_email' => $user->email,
            'customer_phone' => $this->faker->phoneNumber(),
            'subtotal' => $this->faker->randomFloat(2, min: 1000, max: 25000),
            'total' => $this->faker->randomFloat(2, min: 1000, max: 25000),
            'shipping_fee' => $this->faker->randomFloat(2, 50, 150),
            'tax' => $this->faker->randomFloat(2, 35, 85),
            'is_paid' => $this->faker->boolean(80),
            'status' => function (array $attributes) {
                return $attributes['is_paid'] ? Arr::random(['shipping', 'delivered']) : 'pending';
            },
            'tracking_number' => function (array $attributes) {
                return $attributes['is_paid'] ? Str::random(10) : null;
            }
        ];
    }

}

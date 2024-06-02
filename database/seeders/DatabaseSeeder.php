<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // dummy data for local testing
        if (config('app.env') == 'local') {
            // admin user
            $admin = User::factory()->create([
                'name' => 'Admin',
                'email' => config('app.admin.email'),
                'password' => Hash::make(config('app.admin.password'))
            ])->first();

            $admin->role = 'A';
            $admin->save();
            User::factory(40)->create([
                'created_at' => now()->subMonths(rand(0,5))->subHours(rand(24,120))
            ]);

            \Laravel\Prompts\info('Admin and users seeded.');

            \Laravel\Prompts\info('Creating Posts');
            Tag::factory(40)->create();
            Category::factory()->has(Post::factory()->count(10))->count(25)->create();
            \Laravel\Prompts\info('Posts seeded');

            // initialize discount
            $discount = Discount::updateOrCreate(
                [
                    'code' => 'NEWCOMER10'
                ],
                [
                    'code' => 'NEWCOMER10',
                    'rate' => 0.10,
                    'expires_after' => 1000,
                ]
            );

            \Laravel\Prompts\info("Discount seeded.");

            $users = User::factory(40)->create([
                'created_at' => now()->subYear()->addMonths(rand(1,6))->subHours(rand(34,120))
            ]);

            $products = Product::factory()
                ->count(50)
                ->has(
                    ProductFeature::factory()
                        ->count(3)
                )
                ->create();

            \Laravel\Prompts\info("Users & order products seeded.");

            for ($i__ = 1; $i__ <= 100; $i__++)
            {
                // order for a random user
                $order = Order::factory()->create([
                    'user_id' => $users->random()->id,
                    'discount_id' => $discount->id,
                    'created_at' => Arr::random([
                        now()->subMonths(rand(0, 5))->addHours(rand(24,48)),
                        now()->subYears(rand(2,3))->addMonths((rand(1,12)))->addHours(rand(14,72)),
                        now()->subYear()->addMonths(rand(0,10))->subHours(rand(24,144))
                    ])
                ]);

                \Laravel\Prompts\info("Order {$i__} created.");

                // let's generate random order items for this order
                $itemCount = rand(2, 5);

                for ($item = 1; $item < $itemCount; $item++)
                {
                    $product = $products->random();

                    $q = random_int(1, 3); // quantity

                    // we'll use products price to calculate the subtotal
                    /** @var float $price */
                    $price = $product->price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $q,
                        'subtotal' => $price * $q
                    ]);
                }

                $order->total -= (float)number_format((float)$order->subtotal * (float)$discount->rate, 2);
                $order->save();
            }

            \Laravel\Prompts\info("Orders processed.");

            Product::factory(15)
                ->has(ProductFeature::factory()->count(3))
                ->create();
        }
    }
}

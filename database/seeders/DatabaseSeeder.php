<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (config('app.env') == 'local') {
            $admin = User::factory()->create([
                'name' => 'Admin',
                'email' => config('app.admin.email'),
                'password' => Hash::make(config('app.admin.password'))
            ])->first();

            $admin->role = 'A';
            $admin->save();

            Category::factory(10)->create();
            Tag::factory(10)->create();
            Post::factory(30)->create();

            Product::factory(15)->create();
        }
    }
}

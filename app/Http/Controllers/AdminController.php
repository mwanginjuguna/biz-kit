<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function posts(): View
    {
        return view('admin.posts.index');
    }

    public function dashboard(): View
    {
        $posts = Post::query()->latest()->get();
        $published = $posts->where('is_published')->count();
        $products = Product::query()->latest()->get();
        $orders = Order::select(['id', 'user_id', 'total', 'discount_id', 'customer_name'])->latest()->get();
        $users = User::all();
        $messages = ContactMessage::all();

        return view('admin.dashboard', [
            'posts' => $posts,
            'publishedCount' => $published,
            'products' => $products,
            'orders' => $orders,
            'contactMessages' => $messages,
            'users' => $users
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }
}

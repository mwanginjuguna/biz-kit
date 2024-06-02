<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function posts(): View
    {
        return view('admin.posts.index');
    }

    public function dashboard(): View
    {
        $posts = Post::query()->orderBy('views', 'desc')->get();

        $orders = Order::query()->with('products')->latest()->get();

        $products = Product::query()->latest()->get();
        $purchasedProducts = Product::query()->whereHas('orders')->count();
        $topProducts = Product::query()->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('count(order_items.product_id) as count'))
            ->groupBy('products.id')
            ->orderBy('count', 'DESC')
            ->take(5)
            ->get();

        $users = User::all();

        return view('admin.dashboard', [
            'posts' => $posts,
            'products' => $products,
            'topProducts' => $topProducts,
            'purchasedProducts' => $purchasedProducts,
            'orders' => $orders,
            'users' => $users
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }
}

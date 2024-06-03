<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function stats(): \Illuminate\Support\Collection
    {
        return collect([
            'orders' => Order::query()->latest()->get(),
            'products' => Product::query()->latest()->get(),
            'users' => User::query()->whereNot('role', '=', 'A')->latest()->get(),
            'purchasedProducts' => $this->purchasedProducts(),
        ]);
    }

    public function topProducts($take = 5): Collection|array
    {
        return Product::query()->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('count(order_items.product_id) as count'))
            ->groupBy('products.id')
            ->orderBy('count', 'DESC')
            ->take($take)
            ->get();
    }

    public function purchasedProducts(): Collection|array
    {
        return Product::query()->whereHas('orders')->get();
    }

    public function posts(): View
    {
        return view('admin.posts.index');
    }

    public function dashboard(): View
    {
        $posts = Post::query()->orderBy('views', 'desc')->get();

        $data = $this->stats();

        return view('admin.dashboard', [
            'posts' => $posts,
            'products' => $data->get('products'),
            'topProducts' => $this->topProducts(),
            'purchasedProducts' => $this->purchasedProducts()->count(),
            'orders' => $data->get('orders'),
            'users' => $data->get('users'),
            'messages' => ContactMessage::all()
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }

    public function orders()
    {
        $data = $this->stats();

        return view('admin.orders.index', [
            'products' => $data->get('products')->count(),
            'purchasedProducts' => $this->purchasedProducts()->count(),
            'orders' => $data->get('orders'),
            'users' => $data->get('users')->count(),
        ]);
    }
}

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
            'orders' => Order::query(),
            'products' => Product::query(),
            'users' => User::query()->whereNot('role', '=', 'A'),
            'purchasedProducts' => $this->purchasedProducts(),
            'customers' => Order::query()->selectRaw('count(distinct user_id) as customers')->get()->first()->customers
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

        $posts = Post::query()->with('category')->orderBy('views', 'desc')->get();

        $data = $this->stats();

        return view('admin.dashboard', [
            'posts' => $posts,
            'productsCount' => $data['products']->count(),
            'stocked' => $data['products']->where('stock_quantity', '>', 0)->count(),
            'topProducts' => $this->topProducts(),
            'purchasedProducts' => $this->purchasedProducts()->count(),
            'ordersCount' => $data['orders']->count(),
            'pendingOrders' => $data['orders']->where('status', 'pending')->count(),
            'customers' => $data['customers'],
            'usersCount' => $data['users']->count(),
            'users' => $data['users']->latest()->take(5)->get(),
            'messages' => ContactMessage::all()
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }

    public function orders(): View
    {
        $data = $this->stats();

        return view('admin.orders.index', [
            'products' => $data['products']->count(),
            'purchasedProducts' => $this->purchasedProducts()->count(),
            'orders' => $data['orders']->get(),
            'customers' => $data['customers'],
            'users' => $data['users']->count(),
        ]);
    }
}

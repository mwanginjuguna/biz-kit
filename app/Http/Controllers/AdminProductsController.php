<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    public function products(): View
    {
        $products = Product::query()->orderBy('views', 'desc')->get();
        $users = User::all();

        return view('admin.products.index', [
            'products' => $products,
            'users' => $users,
            'purchasedProducts' => $this->purchasedProducts()->count()
        ]);
    }

    public function purchasedProducts(): Collection|array
    {
        return Product::query()->whereHas('orders')->get();
    }

    public function editProduct(Request $request, Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }
}

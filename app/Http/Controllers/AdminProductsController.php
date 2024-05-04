<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    public function products(): View
    {
        $products = Product::all();
        $users = User::all();

        return view('admin.products.index', [
            'products' => $products,
            'users' => $users
        ]);
    }
}

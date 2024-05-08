<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
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

        return view('admin.dashboard', [
            'posts' => $posts,
            'publishedCount' => $published,
            'products' => $products
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }
}

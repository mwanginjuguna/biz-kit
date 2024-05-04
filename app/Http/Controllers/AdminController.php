<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        return view('admin.dashboard', [
            'posts' => $posts,
            'publishedCount' => $published,
        ]);
    }

    public function uploads(): View
    {
        return view('admin.file-uploads');
    }
}

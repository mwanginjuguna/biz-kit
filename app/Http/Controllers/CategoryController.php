<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.posts.categories', [
            'categories' => Category::with('posts')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required']);

        Category::updateOrCreate(
            [
                'name' => $request->input('name')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description') ?? null
            ]
        );

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }
}

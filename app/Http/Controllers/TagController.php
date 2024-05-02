<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        return view('admin.posts.tags', [
            'tags' => Tag::with('posts')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['name' => 'required']);

        Tag::updateOrCreate(
            [
                'name' => $request->input('name')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description') ?? null
            ]
        );

        return redirect()->route('admin.tags')->with('success', 'Tag added successfully!');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tags')->with('success', 'Tag added successfully!');
    }
}

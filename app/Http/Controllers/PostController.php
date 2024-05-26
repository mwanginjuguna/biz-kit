<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->latest()
            ->simplePaginate(15);

        return view('pages.blog', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.posts.new', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($request->input('category') !== null) {
            $category = Category::create([
                'name' => $request->input('category')
            ]);

            $categoryId = $category->id;
        } else {
            $categoryId = $request->input('categoryId') ?? null;
        }

        $tag = Tag::updateOrCreate(
            [
                'name' => $request->input('tag')
            ],
            [
                'name' => $request->input('tag')
            ]
        );

        $title = $request->input('title');

        $post = Post::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'category_id' => $categoryId,
            'tag_id' => $tag->id,
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'excerpt' => $request->input('excerpt'),
        ]);

        $post->tags()->attach($tag);

        return redirect()->route('admin.posts')->with('success', 'Post saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $post->views += 1;
        $post->save();


        return view('pages.post-view', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        if ($post->isDirty()) {
            $post->save();

            $message = "Post updated with new information";
        } else {
            $message = "No changes made to the post";
        }

        return redirect()->route('admin.posts')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }
}

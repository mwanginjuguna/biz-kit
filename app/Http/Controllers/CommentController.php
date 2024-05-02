<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('admin.posts.categories', [
            'categories' => Comment::with('posts')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required',
            'post_id' => 'required'
        ]);


        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()
            ->where('email', '=', $validated['email'])
            ->where('password', '=', $validated['password'])
            ->first();

        if (!$user->exists()) {
            $user = User::updateOrCreate(
                [
                    'email' => $validated['email'],
                    'password' => $validated['password']
                ],
                [
                    'name' => $request->input('userName'),
                    'email' => $validated['email'],
                    'password' => $validated['password']
                ]
            );
        }

        Comment::create(
            [
                'content' => $validated['content'],
                'post_id' => $validated['post_id'],
                'user_id' => $user->id
            ]
        );

        return redirect()->route('admin.categories')->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('admin.categories')->with('success', 'Comment added successfully!');
    }
}

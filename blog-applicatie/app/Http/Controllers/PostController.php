<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::with('user')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        auth()->user()->posts()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('posts.index')->with('status', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'comments' => $post->comments()->with('user')->latest()->paginate(10),
        ]);
    }

    public function edit(Post $post)
    {
        // Add authorization logic if needed
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('posts.show', $post)->with('status', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Add authorization logic if needed
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post deleted successfully!');
    }
}

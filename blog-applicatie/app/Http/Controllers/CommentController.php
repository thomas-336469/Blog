<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => [
                'required', 'string',  'max:255'
            ]
        ]);
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body'), // Add this line to set the 'body' field
        ]);

        return redirect()->back()->with('status', 'comment-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        if ($user->id === $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('status', 'comment-deleted');
        } else {
            // Handle unauthorized deletion
            return redirect()->back()->with('status', 'unauthorized');
        }
    }
}

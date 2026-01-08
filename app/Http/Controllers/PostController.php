<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\CommentStatsService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 5, function () {
                return Post::with('author')->latest()->get();
        });

        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        auth()->user()->posts()->create($request->all());
        return redirect()->route('posts.index');
    }
    
    public function show(Post $post, CommentStatsService $commentStats)
    {
        $commentsCount = $commentStats->count($post);
        $lastCommentedAt = $commentStats->lastCommentedAt($post);
        
        return view('posts.show', compact('post','commentsCount','lastCommentedAt'));
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect back with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
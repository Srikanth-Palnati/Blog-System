<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;  

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back();
    }
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()
            ->route('posts.show', $comment->post_id)
            ->with('success', 'Comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        //$this->authorize('delete', $comment);

        $postId = $comment->post_id;
        $comment->delete();

        return redirect()
            ->route('posts.show', $postId)
            ->with('success', 'Comment deleted successfully');
    }
}

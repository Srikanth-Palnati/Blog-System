<?php
namespace App\Services;

use App\Models\Post;

class CommentStatsService
{
    /**
     * Get total comments count for a post
     */
    public function count(Post $post): int
    {
        return $post->comments()->count();
    }

    /**
     * Get last commented time for a post
     */
    public function lastCommentedAt(Post $post): ?string
    {
        $lastComment = $post->comments()
            ->latest()
            ->first();
        
        return $lastComment
            ? $lastComment->created_at->diffForHumans()
            : null;
    }
}

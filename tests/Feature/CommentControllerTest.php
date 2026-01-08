<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_add_comment_to_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->post(
            route('comments.store', $post),
            ['content' => 'Nice post!']
        );

        $response->assertRedirect();
        $this->assertDatabaseHas('comments', [
            'content' => 'Nice post!',
            'post_id' => $post->id
        ]);
    }
}

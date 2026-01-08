@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            

    <p class="text-gray-500 mb-4">
        By {{ $post->author->name }} - {{ $post->created_at->toFormattedDateString() }}
    </p>

    <div class="mb-6">
        {{ $post->content }}
    </div>

    @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 mr-2">Edit</a>
    @endcan 

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button class="text-red-500">Delete</button>
        </form>
    @endcan
</div>

{{-- Comments --}}
<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4">Comments</h3>
    <div class="mb-4 text-sm text-gray-600">
        <p>Comments: {{ $commentsCount }}</p>

        @if($lastCommentedAt)
            <p>Last commented: {{ $lastCommentedAt }}</p>
        @endif
    </div>

    @foreach($post->comments as $comment)
        <div class="bg-gray-100 p-4 rounded mb-2">
            <p>{{ $comment->content }}</p>
            <small class="text-gray-600">
                {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
            </small><br>
            
            
            @can('update', $comment)
                <a href="{{ route('comments.edit', $comment) }}"
                class="text-blue-500 ml-2">
                Edit
                </a>
            @endcan

            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}"
                  method="POST"
                  class="inline">
                @csrf
                @method('DELETE')

                <button class="text-red-500 ml-2">
                    Delete
                </button>
                </form>
            @endcan
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="content" class="w-full border rounded p-2" required></textarea>
            <button class="bg-blue-500  px-4 py-2 mt-2 rounded">
                Add Comment
            </button>
        </form>
    @endauth
    
</div>
@endsection


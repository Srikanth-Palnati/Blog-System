@extends('layouts.app')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Posts</h1>

    @auth
        <a href="{{ route('posts.create') }}" class="bg-blue-500  rounded">
            Create Post
        </a>
    @endauth
</div>

@foreach($posts as $post)
    <div class="bg-white p-6 rounded shadow mb-4">
        <h2 class="text-xl font-semibold">
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </h2>
        <p class="text-gray-600 text-sm">
            By {{ $post->author->name }}  -  {{ $post->created_at->diffForHumans() }}
        </p>

        <p class="mt-2">{{ Str::limit($post->content, 150) }}</p>
    </div>
@endforeach
@endsection

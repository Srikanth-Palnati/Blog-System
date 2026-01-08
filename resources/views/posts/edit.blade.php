<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app') <!-- optional if you have a layout -->

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- needed for PUT request -->

        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" class="border w-full p-2" required value="{{ $post->title }}">
        </div>

        <div class="mb-4">
            <label for="content">Content</label>
            <textarea name="content" class="border w-full p-2"  rows="5" required >{{ $post->content }}</textarea>
        </div>

        <button class="bg-blue-500  px-4 py-2 rounded" type="submit">Update Post</button>
    </form>
@endsection


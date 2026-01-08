@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Post</h1>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $post->title) }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content"
                      rows="6"
                      class="w-full border rounded p-2">{{ old('content', $post->content) }}</textarea>
        </div>

        <button class="bg-blue-500 px-4 py-2 rounded">
            Update Post
        </button>
    </form>
</div>
@endsection

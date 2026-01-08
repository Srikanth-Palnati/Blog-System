@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label>Title</label>
        <input type="text" name="title" class="border w-full p-2" required>
    </div>

    <div class="mb-4">
        <label>Content</label>
        <textarea name="content" class="border w-full p-2" rows="5" required></textarea>
    </div>

    <button class="bg-blue-500  px-4 py-2 rounded">
        Save Post
    </button>
</form>
@endsection

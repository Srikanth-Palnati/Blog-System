@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Comment</h2>

    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')

        <textarea name="content"
                  class="w-full border rounded p-2"
                  required>{{ $comment->content }}</textarea>

        <button class="bg-blue-500 px-4 py-2 mt-2 rounded">
            Update Comment
        </button>
    </form>
</div>
@endsection

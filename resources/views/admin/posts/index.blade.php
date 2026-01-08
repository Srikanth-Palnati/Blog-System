@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Posts</h1>

<table class="w-full border">
    <tr class="bg-gray-200">
        <th>Title</th>
        <th>Author</th>
        <th>Actions</th>
    </tr>

    @foreach($posts as $post)
    <tr class="border-t">
        <td>{{ $post->title }}</td>
        <td>{{ $post->author->name }}</td>
        <td>
            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-500">Edit</a>

            <form action="{{ route('admin.posts.destroy', $post) }}"
                  method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 ml-2">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $posts->links() }}
@endsection

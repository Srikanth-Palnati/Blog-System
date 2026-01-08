@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Users</h1>

<table class="w-full border">
    <tr class="bg-gray-200">
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr class="border-t">
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-500">Edit</a>

            <form action="{{ route('admin.users.destroy', $user) }}"
                  method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 ml-2">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $users->links() }}
@endsection

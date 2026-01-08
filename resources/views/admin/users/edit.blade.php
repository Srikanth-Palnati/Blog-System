@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email', $user->email) }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Role</label>
            <select name="role" class="w-full border rounded p-2">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button class="bg-blue-500 px-4 py-2 rounded">
            Update User
        </button>
    </form>
</div>
@endsection

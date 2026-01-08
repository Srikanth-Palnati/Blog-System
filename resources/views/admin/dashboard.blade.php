@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Users</h2>
        <p class="text-3xl">{{ $users }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Posts</h2>
        <p class="text-3xl">{{ $posts }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Comments</h2>
        <p class="text-3xl">{{ $comments }}</p>
    </div>
</div>
@endsection

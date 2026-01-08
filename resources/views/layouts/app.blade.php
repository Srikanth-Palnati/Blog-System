<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Blog System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow mb-6">
    <div class="container mx-auto px-6 py-4 flex justify-between">
        
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="font-bold text-lg">
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}" class="font-bold text-lg">
                    Users
                </a>

                <a href="{{ route('admin.posts.index') }}" class="font-bold text-lg">
                    Blogs
                </a>
            @else
                <a href="{{ route('posts.index') }}" class="font-bold text-lg">
                    Blogs
                </a>
            @endif
        @endauth        
        <div>
            @auth
                <span class="mr-4">{{ auth()->user()->name }}</span>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="mr-4">Admin</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>

<main class="container mx-auto px-6">
    @yield('content')
</main>

</body>
</html>

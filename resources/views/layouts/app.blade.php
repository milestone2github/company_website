<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    <header>
        @include('includes.header')
    </header>
    <main class="container mx-auto py-6">
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-white p-4 text-center">
        <p>&copy; {{ date('Y') }} mNivesh. All rights reserved.</p>
    </footer>
</body>
</html>

<!-- resources/views/layouts/status.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'mNivesh')</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<body class="bg-[#101211] dark:bg-[#fff0d1] text-gray-800 dark:text-[#101211] transition-all duration-500">

    <!-- Include Header -->
    @include('includes.header')

    <!-- Main Content -->
    <main class="container mx-auto p-10">
        @yield('content')
    </main>

    <!-- Include JavaScript -->
    <script src="{{ asset('js/header.js') }}"></script>
</body>

</html>

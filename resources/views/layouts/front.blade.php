<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mNivesh</title>
    <!-- Include any necessary CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Header or Navigation -->
    <header>
        <h1>mNivesh</h1>
        <!-- Add navigation links if necessary -->
    </header>

    <!-- Main Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 mNivesh. All rights reserved.</p>
    </footer>

    <!-- Include any necessary JS files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

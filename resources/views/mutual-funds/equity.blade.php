<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the best Equity Mutual Funds for your investments. Learn about their benefits, risks, and performance.">
    <meta name="keywords" content="Equity Mutual Funds, Best Equity Funds, Mutual Fund Investment">
    <meta name="author" content="mNivesh">
    <title>Equity Mutual Funds - mNivesh</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body class="bg-gray-100 dark:bg-[#121212] text-gray-800 dark:text-gray-200">
    <!-- Include Header -->
    <header>
        @include('includes.header')
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-6">
        <h1 class="text-4xl font-bold mb-4">Equity Mutual Funds</h1>
        <div class="relative">
            <img src="{{ asset('images/equity-funds.jpg') }}" alt="Equity Mutual Funds" class="w-1/3 float-right ml-4 mb-4 rounded-lg shadow-md">
            <p class="text-lg leading-relaxed">
                Equity Mutual Funds are an excellent option for investors looking for long-term growth. These funds invest primarily in stocks, aiming to generate significant returns by taking advantage of market fluctuations.
                <br><br>
                Whether you're a seasoned investor or just starting out, Equity Mutual Funds can provide a mix of high returns and diversification to your portfolio. Learn more about the best-performing funds and start your investment journey today.
            </p>
        </div>
        <p class="text-lg leading-relaxed mt-4">
            The mNivesh platform offers expert-curated lists of Equity Mutual Funds, ensuring you make informed decisions. Dive into the world of investments and secure your financial future.
        </p>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-4 text-center">
        <p>&copy; {{ date('Y') }} mNivesh. All rights reserved.</p>
    </footer>

    <!-- Include JS -->
    <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>

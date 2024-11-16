@extends('layouts.app')

@section('title', 'Debt Mutual Funds')

@section('content')
<article class="container mx-auto p-5">
    <!-- Title -->
    <header>
        <h1 class="text-4xl font-bold mb-4">Debt Mutual Funds</h1>
    </header>

    <!-- Description with Image in Top Right Corner -->
    <section class="relative">
        <div class="flex">
            <!-- Description Text -->
            <p class="text-lg leading-relaxed">
                <img src="{{ asset('images/debt-mutual-funds.jpg') }}" alt="Debt Mutual Funds" class="w-1/3 float-right ml-4 mb-4 rounded-lg shadow-md">
                Debt Mutual Funds primarily invest in fixed-income securities like government bonds, corporate bonds, treasury bills, and money market instruments. These funds are ideal for investors looking for stable income with lower risk compared to equity investments.
                <br><br>
                Debt funds come with varying maturity periods and risk levels, ranging from short-term to long-term investments. They provide better liquidity compared to fixed deposits and are more tax-efficient for investors in higher tax brackets. Moreover, debt funds are less volatile, making them suitable for conservative investors and those with short-term financial goals.
                <br><br>
                While debt funds are considered safer than equity funds, they are not risk-free. Interest rate movements and credit risk can affect their performance. It’s crucial for investors to align their fund selection with their risk appetite and investment horizon.
            </p>
        </div>
    </section>
</article>
@endsection

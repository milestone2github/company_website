<!-- resources/views/includes/header.blade.php -->
<header class="bg-gray-900 dark:bg-[#fff0d1] p-5 shadow-md">

    <div class="container mx-auto flex items-center relative">
        <!-- Mobile Menu Button -->
        <button class="text-white mr-4 md:hidden" onclick="toggleMobileMenu()">
            <!-- Hamburger Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Logo -->
        <a href="/" class="flex-shrink-0">
            <img src="{{ asset('images/LOGOfinal.png') }}" alt="mNivesh Logo" class="w-32 h-auto">
        </a>

        <!-- Navigation Menu -->
        <nav class="desktop-menu hidden md:flex ml-8 relative">
            <div class="flex space-x-6">
                <!-- Mutual Funds -->
                <div class="menu-item group">
                    <a href="#" class="menu-link transition-all duration-300">Mutual Funds</a>
                    <!-- Submenu -->
                    <div class="submenu-modal rounded-lg">
                        <div id='mf-items' class="flex flex-wrap justify-start gap-4 p-2 px-3 max-w-80">
                            <!-- Submenu Items -->
                            <a href="/mutual-funds/equity" class="submenu-item text-black grow flex-shrink-0">Equity MF</a>
                            <a href="/mutual-funds/debt" class="submenu-item text-black grow flex-shrink-0">Debt MF</a>
                            <a href="/mutual-funds/hybrid" class="submenu-item text-black grow flex-shrink-0">Hybrid MF</a>
                            <!-- <a href="#" class="submenu-item text-black grow flex-shrink-0">Latest NFO</a>
                                <a href="#" class="submenu-item text-black grow flex-shrink-0">Check KYC</a>
                                <a href="#" class="submenu-item text-black grow flex-shrink-0">Top Schemes</a> -->
                        </div>
                    </div>
                </div>
                <!-- Fixed Deposits -->
                <div class="menu-item group">
                    <a href="#" class="menu-link transition-all duration-300">FD and Bonds</a>
                    <!-- Submenu -->
                    <div class="submenu-modal rounded-lg">
                        <div class="flex flex-wrap justify-start gap-4 p-4">
                            <!-- Submenu Items -->
                            <a href="#" class="submenu-item text-black flex-shrink-0">Bank FD</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Corporate FD</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Bonds</a>
                        </div>
                        <div class="flex flex-wrap justify-start gap-4 p-4">
                            <a href="#" class="submenu-item text-black flex-shrink-0">Government</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Corporate</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Tax-Free</a>
                        </div>
                    </div>
                </div>
                <!-- Insurance -->
                <div class="menu-item group">
                    <a href="#" class="menu-link transition-all duration-300">Insurance</a>
                    <!-- Submenu -->
                    <div class="submenu-modal rounded-lg">
                        <div class="flex flex-wrap justify-start gap-4 p-4">
                            <!-- Submenu Items -->
                            <a href="/insurance/life" class="submenu-item text-black flex-shrink-0">Life Insurance</a>
                            <a href="/insurance/health" class="submenu-item text-black flex-shrink-0">Health Insurance</a>
                            <!-- <a href="/insurance/term" class="submenu-item text-black flex-shrink-0">Term Insurance</a> -->
                        </div>
                    </div>
                </div>
                <!-- Bonds -->
                <div class="menu-item group">
                    <a href="#" class="menu-link transition-all duration-300">Stock Market</a>
                    <!-- Submenu -->
                    <div class="submenu-modal rounded-lg">
                        <div class="flex flex-wrap justify-start gap-4 p-4">
                            <!-- Submenu Items -->
                            <a href="#" class="submenu-item text-black flex-shrink-0">Intn'l Stock Market</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Domestic Stock Market</a>
                            <a href="#" class="submenu-item text-black flex-shrink-0">Unlisted Securities</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Spacer to push buttons to the right -->
        <div class="flex-grow"></div>

        <!-- Buttons -->
        <div class="space-x-4 flex">
            <!-- <button onclick="openSignInModal()"
                    class="bg-[rgba(255,255,255,0.08)] text-white rounded-lg border border-white hover-increase-font transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                    Sign In
                </button>
                <button
                    class="get-started-button rounded-lg shadow-md transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                    Get Started
                </button> -->
            <a href="https://mnivesh.investwell.app/app/#/public/signup/1"
                target="_blank"
                class="bg-[rgba(255,255,255,0.08)] text-white rounded-lg border border-white hover-increase-font transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                Sign In
            </a>
            <a href="https://mnivesh.investwell.app/app/#/login"
                target="_blank"
                class="get-started-button rounded-lg shadow-md transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                Get Started
            </a>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <nav id="mobileMenu" class="mobile-menu md:hidden">
        <!-- Mutual Funds -->
        <div class="border-b border-gray-700">
            <button onclick="toggleSubmenu('mobile-submenu-mutual-funds')" class="w-full text-left px-4 py-2 menu-link flex justify-between items-center">
                Mutual Funds
                <!-- Arrow Icon -->
                <svg class="w-4 h-4 transition-transform" id="arrow-mobile-submenu-mutual-funds" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414 5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="mobile-submenu-mutual-funds" class="submenu-hidden bg-yellow-500 bg-opacity-50">
                <div class="flex flex-col p-2">
                    <!-- Submenu Items -->
                    <a href="#" class="text-black px-2 py-1">Equity</a>
                    <a href="#" class="text-black px-2 py-1">Debt</a>
                    <a href="#" class="text-black px-2 py-1">Hybrid</a>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for other mobile submenus -->
        <!-- Fixed Deposits, Insurance, Bonds -->
    </nav>
</header>

<!-- Sign In Modal -->
<div id="signInModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeSignInModal()">&times;</span>
        <div id="signInFields">
            <div class="sign-in-header">
                <img src="{{ asset('images/cross-icon.png') }}" alt="Sign In Icon" class="sign-in-icon">
                <h2 class="text-2xl font-bold">Sign In</h2>
            </div>
            <input type="text" placeholder="Mobile or Email" class="w-full p-2 mb-4 border border-gray-300 rounded-md">
            <button onclick="sendOTP()" class="bg-yellow-500 text-black w-full py-2 rounded-md">Send OTP</button>
            <div class="text-center mt-4">or</div>
            <div class="text-center mt-4 font-bold" id="sign-in-with-text">Sign in with</div>
            <div class="sso-icons">
                <img src="{{ asset('images/google-logo.png') }}" onclick="googleSso()" alt="Google" class="sso-icon" id="google-logo">
                <img src="{{ asset('images/zoho-logo.png') }}" onclick="zohoSso()" alt="Zoho" class="sso-icon" id="zoho-logo" style="width: 40px; height: 25px;">
                <img src="{{ asset('images/yahoo-logo.png') }}" onclick="yahooSso()" alt="Yahoo" class="sso-icon" id="yahoo-logo">
                <img src="{{ asset('images/apple-logo.png') }}" onclick="appleSso()" alt="Apple" class="sso-icon" id="apple-logo" style="width: 30px; height: 40px;">
            </div>
            <div class="text-center mt-4">or</div>
            <div class="text-center mt-4">
                <a href="#" class="text-white hover:underline">Sign in with password instead</a>
            </div>

        </div>
        <div id="otpFields" class="hidden">
            <span class="modal-close" onclick="closeSignInModal()">&times;</span>
            <!-- Back Button (Mirror Image of Close Button) -->
            <button class="otp-back-button" onclick="goBackToSignIn()">&#8592;</button>

            <!-- Enter OTP Header (Center-Aligned) -->
            <h2 class="text-2xl otp-header mb-4">Enter OTP</h2>

            <div class="flex justify-center mb-4">
                <input type="text" maxlength="1" class="otp-input" placeholder="*">
                <input type="text" maxlength="1" class="otp-input" placeholder="*">
                <input type="text" maxlength="1" class="otp-input" placeholder="*">
                <input type="text" maxlength="1" class="otp-input" placeholder="*">
            </div>
            <button class="bg-yellow-500 text-black w-full py-2 rounded-md mb-2" onclick="verifyOTP()">Verify OTP</button>
            <button class="bg-gray-500 text-white w-full py-2 rounded-md" onclick="resendOTP()">Resend OTP</button>
        </div>
    </div>
</div>
</header>
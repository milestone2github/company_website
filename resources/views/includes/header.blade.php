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
                        <div class="flex flex-wrap justify-start gap-4 p-4">
                            <!-- Submenu Items -->
                            <a href="/Equity-Mutual-Funds" class="submenu-item text-black flex-shrink-0">Equity MF</a>
                            <a href="/Debt-Mutual-Funds" class="submenu-item text-black flex-shrink-0">Debt MF</a>
                            <a href="/Hybrid-Mutual-Funds" class="submenu-item text-black flex-shrink-0">Hybrid MF</a>
                            <!-- </div><div class="flex flex-wrap justify-start gap-4 p-4">
                                <a href="#" class="submenu-item text-black flex-shrink-0">Latest NFO</a>
                                <a href="#" class="submenu-item text-black flex-shrink-0">Check KYC</a>
                                <a href="#" class="submenu-item text-black flex-shrink-0">Top Schemes</a> -->
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
                            <a href="life-insurance" class="submenu-item text-black flex-shrink-0">Life Insurance</a>
                            <a href="health-insurance" class="submenu-item text-black flex-shrink-0">Health Insurance</a>
                            <a href="corporate-insurance" class="submenu-item text-black flex-shrink-0">Corporate Insurance</a>
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
            <button onclick="openSignInModal()"
                class="bg-[rgba(255,255,255,0.08)] text-white rounded-lg border border-white hover-increase-font transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                Sign In
            </button>
            <a href="https://mnivesh.investwell.app/app/#/public/signup/1"
                target="_blank"
                class="get-started-button rounded-lg shadow-md transition-all duration-300 px-2 py-1 md:px-4 md:py-2 text-sm md:text-base">
                Get Started
            </a>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <nav id="mobileMenu" class="hidden md:hidden">
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
        <!-- FD and Bonds -->
        <div class="border-b border-gray-700">
            <button onclick="toggleSubmenu('mobile-submenu-fd-bonds')" class="w-full text-left px-4 py-2 menu-link flex justify-between items-center">
                FD and Bonds
                <!-- Arrow Icon -->
                <svg class="w-4 h-4 transition-transform" id="arrow-mobile-submenu-fd-bonds" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414 5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="mobile-submenu-fd-bonds" class="submenu-hidden bg-yellow-500 bg-opacity-50">
                <div class="flex flex-col p-2">
                    <!-- Submenu Items -->
                    <a href="#" class="submenu-item text-black flex-shrink-0">Bank FD</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Corporate FD</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Bonds</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Government</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Corporate</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Tax-Free</a>
                </div>
            </div>
        </div>

        <!-- Insurance -->
        <div class="border-b border-gray-700">
            <button onclick="toggleSubmenu('mobile-submenu-insurance')" class="w-full text-left px-4 py-2 menu-link flex justify-between items-center">
                Insurance
                <!-- Arrow Icon -->
                <svg class="w-4 h-4 transition-transform" id="arrow-mobile-submenu-insurance" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414 5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="mobile-submenu-insurance" class="submenu-hidden bg-yellow-500 bg-opacity-50">
                <div class="flex flex-col p-2">
                    <!-- Submenu Items -->
                    <a href="/life-insurance" class="submenu-item text-black flex-shrink-0">Life Insurance</a>
                    <a href="/health-insurance" class="submenu-item text-black flex-shrink-0">Health Insurance</a>
                    <a href="/corporate-insurance" class="submenu-item text-black flex-shrink-0">Corporate Insurance</a>
                </div>
            </div>
        </div>

        <!-- Stock market -->
        <div class="border-b border-gray-700">
            <button onclick="toggleSubmenu('mobile-submenu-stock-market')" class="w-full text-left px-4 py-2 menu-link flex justify-between items-center">
                Stock Market
                <!-- Arrow Icon -->
                <svg class="w-4 h-4 transition-transform" id="arrow-mobile-submenu-stock-market" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414 5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="mobile-submenu-stock-market" class="submenu-hidden bg-yellow-500 bg-opacity-50">
                <div class="flex flex-col p-2">
                    <!-- Submenu Items -->
                    <a href="#" class="submenu-item text-black flex-shrink-0">Intn'l Stock Market</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Domestic Stock Market</a>
                    <a href="#" class="submenu-item text-black flex-shrink-0">Unlisted Securities</a>
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
            <div class="sign-in-header mb-1">
                <img src="{{ asset('images/cross-icon.png') }}" alt="Sign In Icon" class="sign-in-icon">
                <h2 class="text-2xl font-bold">Sign In</h2>
            </div>
            <!-- Country Code Input -->
            <div class="flex items-center space-x-0 mb-4 relative">
                <!-- Country Code Dropdown -->
                <div class="relative w-24">
                    <input
                        id="countryCodeInput"
                        class="border border-gray-300 p-2 px-1 rounded-s-md bg-white text-gray-900 w-full cursor-pointer"
                        value="+91"
                        placeholder="+91"
                        autocomplete="off" />
                    <div id="countryCodesDropdown" class="absolute hidden w-44 rounded-md bg-white border border-gray-300 mt-1 max-h-48 overflow-y-auto z-10 shadow-lg">
                        <!-- Country code options will be populated here -->
                    </div>
                </div>

                <!-- Mobile Input -->
                <input
                    type="text"
                    placeholder="Mobile or Email"
                    id="mobileOrEmail"
                    class="w-full p-2 border border-gray-300 rounded-e-md text-gray-900" />
            </div>

            <!-- OTP Delivery Method -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-300 mb-2">Receive OTP via:</label>
                <div class="flex items-center space-x-4">
                    <label class="delivery-channel-labels relative text-center border border-gray-500 rounded-md py-1 px-2 w-full">
                        <input type="radio" name="otpDeliveryChannel" value="sms" class="absolute invisible accent-blue-600" checked>
                        SMS
                    </label>
                    <label class="delivery-channel-labels relative text-center border border-gray-500 rounded-md py-1 px-2 w-full focus-within:bg-blue-950 focus-within:border-blue-700">
                        <input type="radio" name="otpDeliveryChannel" value="whatsapp" class="absolute invisible accent-blue-600">
                        WhatsApp
                    </label>
                </div>
            </div>

            <button onclick="sendOTP(event)" class="bg-yellow-500 text-black w-full py-2 rounded-md disabled:text-gray-400 disabled:cursor-auto">Send OTP</button>

            <div class="text-center mt-4">or</div>
            <div class="text-center mt-4">
                <a href="https://mnivesh.investwell.app/app/#/login" class="text-white hover:underline">Sign in with password instead</a>
            </div>
        </div>

        <div id="otpFields" class="hidden">
            <span class="modal-close" onclick="closeSignInModal()">&times;</span>
            <!-- Back Button (Mirror Image of Close Button) -->
            <button class="otp-back-button" onclick="goBackToSignIn()">&#8592;</button>
            <p id="signin-modal-alert" class="text-green-500 text-sm mt-4 mb-1 text-center hidden"></p>
            <!-- Enter OTP Header (Center-Aligned) -->
            <h2 class="text-2xl otp-header mt-1 mb-4">Enter OTP</h2>

            <div class="flex justify-center mb-4">
                <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-input text-gray-800" placeholder="*">
                <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-input text-gray-800" placeholder="*">
                <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-input text-gray-800" placeholder="*">
                <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-input text-gray-800" placeholder="*">
            </div>
            <button id="verify-otp" class="bg-yellow-500 text-black w-full py-2 rounded-md mb-2 disabled:text-gray-400 disabled:cursor-auto" onclick="verifyOTP()">Verify OTP</button>
            <button id="resend-otp" class="bg-gray-500 text-white w-full py-2 rounded-md disabled:text-gray-200 disabled:cursor-auto" onclick="resendOTP()">Resend OTP</button>
        </div>
    </div>
</div>
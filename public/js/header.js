        // Ensure dark mode is set by default
        if (!localStorage.getItem('theme')) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }

        // Script to toggle dark mode
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        }

        // Toggle mobile menu
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Toggle mobile submenu
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.classList.toggle('submenu-hidden');
            submenu.classList.toggle('submenu-visible');
            // Rotate arrow icon
            const arrow = document.getElementById('arrow-' + id);
            arrow.classList.toggle('transform');
            arrow.classList.toggle('rotate-180');
        }

        // Open Sign In Modal
        function openSignInModal() {
        const signInButton = document.querySelector('button[onclick="openSignInModal()"]');
        const modal = document.getElementById('signInModal');

        // Temporarily display the modal to get its dimensions
        modal.style.display = 'block';
        modal.style.visibility = 'hidden'; // Hide the modal while getting dimensions

        // Get button position and dimensions
        const buttonRect = signInButton.getBoundingClientRect();
        const modalRect = modal.getBoundingClientRect();

        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

        // Set modal position relative to button
        const modalTop = buttonRect.bottom + scrollTop;
        const modalLeft = buttonRect.left + scrollLeft + (buttonRect.width / 2) - (modalRect.width / 2);

        modal.style.top = `${modalTop}px`;
        modal.style.left = `${modalLeft}px`;

        // Now make the modal visible
        modal.style.visibility = 'visible';

        // Add an event listener to reposition the modal on window resize
        window.addEventListener('resize', repositionModal);

        function repositionModal() {
            const buttonRect = signInButton.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            const modalTop = buttonRect.bottom + scrollTop;
            const modalLeft = buttonRect.left + scrollLeft + (buttonRect.width / 2) - (modalRect.width / 2);
            modal.style.top = `${modalTop}px`;
            modal.style.left = `${modalLeft}px`;
        }
    }

        // Close Sign In Modal
        function closeSignInModal() {
            document.getElementById('signInModal').style.display = 'none';
            window.removeEventListener('resize', repositionModal);
        }

        // Show OTP Fields
        function sendOTP() {
            document.getElementById('signInFields').classList.add('hidden');
            document.getElementById('otpFields').classList.remove('hidden');
        }
        // Handle Back Button to Go Back to Sign-In Fields
        function goBackToSignIn() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
        // Handle Google SSO
        function googleSso() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
        // Handle Zoho SSO
        function zohoSso() {
            document.getElementById('signInFields').classList.add('hidden');
            document.getElementById('otpFields').classList.remove('hidden');
        }
        // Handle Yahoo SSO
        function yahooSso() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
        // Handle Apple SSO
        function appleSso() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
        // Handle Sign In with Password
        function signInWithPassword() {
            document.getElementById('signInFields').classList.add('hidden');
            document.getElementById('otpFields').classList.remove('hidden');
        }
        // Handle OTP Verification
        function verifyOTP() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
        // Handle Resending
        function resendOTP() {
            document.getElementById('otpFields').classList.add('hidden');
            document.getElementById('signInFields').classList.remove('hidden');
        }
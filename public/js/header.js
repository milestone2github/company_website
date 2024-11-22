let phone = '';

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
// function sendOTP() {
//     document.getElementById('signInFields').classList.add('hidden');
//     document.getElementById('otpFields').classList.remove('hidden');
// }
function sendOTP() {
    // Get the input value
    const mobileOrEmail = document.querySelector('#signInFields input').value;

    // Validate input
    if (!mobileOrEmail) {
        alert('Please enter your mobile number or email.');
        return;
    }

    // Prepare data
    const data = {
        phone: mobileOrEmail, // Assuming it's a phone number for OTP
    };

    // Send AJAX request to your Laravel route
    fetch('/api/auth/phone', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to send OTP');
            }
            return response.json();
        })
        .then(data => {
            console.log('OTP sent successfully:', data);
            phone = data.phone;

            // Hide the sign-in fields and show the OTP fields
            document.getElementById('signInFields').classList.add('hidden');
            document.getElementById('otpFields').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to send OTP. Please try again.');
        });
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
    // Collect the OTP entered by the user
    const otpInputs = document.querySelectorAll('.otp-input');
    const otp = Array.from(otpInputs).map(input => input.value).join(''); // Combine all OTP input fields

    // Validate that all fields are filled
    if (otp.length !== 4) {
        alert('Please enter the complete OTP.');
        return;
    }

    // Get the phone number entered by the user
    const phoneNumber = document.querySelector('#signInFields input').value;

    // Validate the phone number
    if (!phoneNumber || phoneNumber.length < 10 || phoneNumber.length > 12) {
        alert('Please enter a valid phone number.');
        return;
    }

    // Prepare the data for the API request
    const data = {
        phone: phoneNumber,
        otp: otp,
    };

    // Show a loading state (optional)
    document.getElementById('verify-otp').innerHTML = 'Verifying...';

    // Make the API request to verify the OTP
    fetch('/api/auth/validate-otp', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(result => {
            // Handle successful response
            if (result.message) {
                alert(result.message); // Show success message
                window.location.href = '/mutual-funds/equity'; // Redirect to the dashboard or desired page
            } else {
                alert(result.error); // Show error message
            }
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
            alert('Failed to verify OTP. Please try again.');
        })
        .finally(() => {
            // Reset the UI
            document.getElementById('otpFields').classList.remove('hidden');
        });
}

// Handle Resending
function resendOTP() {
    document.getElementById('otpFields').classList.add('hidden');
    document.getElementById('signInFields').classList.remove('hidden');
}
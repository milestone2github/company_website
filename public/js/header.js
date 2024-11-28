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
async function sendOTP(e) {
    try {
        // remove existing phone stored in localStorage 
        if(localStorage.getItem('phone')) localStorage.removeItem('phone');
        if(localStorage.getItem('otpDelChnl')) localStorage.removeItem('otpDelChnl');

        // Get the input value
        const input = document.getElementById('mobileOrEmail').value.trim();

        // Validate input
        const isPhone = /^\d{10,12}$/.test(input); // Matches 10-12 digit phone numbers
        const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input); // Matches valid email format

        if (!isPhone && !isEmail) {
            alert('Please enter a valid mobile number or email address.');
            return;
        }

        // Add country code prefix for phone numbers
        let fullPhoneNumber = null;
        if (isPhone) {
            const countryCode = document.getElementById('countryCodeInput').value || '+91'; // Default to India
            if (!countryCode.startsWith('+')) {
                alert('Please select a valid country code.');
                return;
            }
            fullPhoneNumber = `${countryCode}${input}`;
        }

        const otpDeliveryChannel = document.querySelector('input[name="otpDeliveryChannel"]:checked').value;

        // Disable button and show "Sending..."
        const button = e.target;
        button.innerHTML = 'Sending...';
        button.disabled = true;

        // Prepare the data
        const data = isPhone ? { phone: fullPhoneNumber } : { email: input };
        data.otpDeliveryChannel = otpDeliveryChannel;

        // Call the helper function to send OTP
        const result = await sendOTPRequest(data);

        // Handle the response
        if (result.phoneOrEmail) {
            console.log('OTP sent successfully:', result);
            localStorage.setItem('phone', result.phoneOrEmail);
            localStorage.setItem('otpDelChnl', otpDeliveryChannel);

            // Hide the sign-in fields and show the OTP fields
            document.getElementById('signInFields').classList.add('hidden');
            document.getElementById('otpFields').classList.remove('hidden');
        } else {
            alert(result.error || 'Unexpected response from the server.');
        }
    } catch (error) {
        console.error('Error in sendOTP:', error);
        alert('Failed to send OTP. Please try again.');
    } finally {
        // Reset the button state
        const button = e.target;
        button.innerHTML = 'Send OTP';
        button.disabled = false;
    }
}

// send OTP request function 
async function sendOTPRequest(data) {
    // Send AJAX request to your Laravel route
    const response = await fetch('/api/auth/phone', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    });

    // Check if the response is OK
    if (!response.ok) {
        throw new Error('Failed to send OTP');
    }

    // Parse and return the JSON response
    return await response.json();
}


// Handle Back Button to Go Back to Sign-In Fields
function goBackToSignIn() {
    document.getElementById('otpFields').classList.add('hidden');
    document.getElementById('signInFields').classList.remove('hidden');
    let alertItem = document.getElementById('signin-modal-alert');
    alertItem.classList.add('hidden');
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

// api request to login investwell 
async function loginInvestwell(mobile) {
    const endpoint = "/api/auth/login-investwell";

    let alertItem = document.getElementById('signin-modal-alert');
    alertItem.classList.remove('text-red-500');
    alertItem.classList.add('text-green-500');
    alertItem.innerHTML = 'Verifying user...';
    alertItem.classList.remove('hidden');

    try {
        const payload = { mobile: mobile };

        // Open a blank tab immediately
        const newTab = window.open("", "_blank");

        const response = await fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify(payload),
        });

        const data = await response.json();

        if (response.ok && data.url) {
            const redirectUrl = data.url;

            // Redirect the new tab to the desired URL
            newTab.location.href = redirectUrl;
            alertItem.classList.add('hidden');
            localStorage.removeItem('phone');
            localStorage.removeItem('otpDelChnl');
        } else {
            // Close the tab if the response fails
            newTab.close();
            alertItem.classList.remove('text-green-500');
            alertItem.classList.add('text-red-500');
            alertItem.innerHTML = data.error;
        }
    } catch (error) {
        console.error("Error in loginInvestwell:", error);
        alertItem.classList.remove('text-green-500');
        alertItem.classList.add('text-red-500');
        alertItem.innerHTML = "An error occurred. Please try again.";
    }
}

// Handle OTP Verification
async function verifyOTP() {
    try {
        // Collect the OTP entered by the user
        const otpInputs = document.querySelectorAll('.otp-input');
        const otp = Array.from(otpInputs).map(input => input.value).join(''); // Combine all OTP input fields
        let alertItem = document.getElementById('signin-modal-alert')
        if (!alertItem.classList.contains('hidden')) {
            alertItem.classList.add('hidden');
        }

        // Validate that all fields are filled
        if (otp.length !== 4) {
            alert('Please enter the complete OTP.');
            return;
        }

        // Get the phone number entered by the user
        const phone = localStorage.getItem('phone');

        // Prepare the data for the API request
        const data = {
            phone: phone,
            otp: otp,
        };

        // Show a loading state (optional)
        const verifyOtpButton = document.getElementById('verify-otp');
        verifyOtpButton.innerHTML = 'Verifying...';
        verifyOtpButton.disabled = true;

        // Make the API request to verify the OTP
        const response = await fetch('/api/auth/validate-otp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        // Handle response
        if (response.ok) {
            if (result.mobile) {
                alertItem.classList.remove('text-red-500');
                alertItem.classList.add('text-green-500');
                alertItem.innerHTML = 'OTP Verified';
                alertItem.classList.remove('hidden');
                await loginInvestwell(result.mobile);
            } else {
                alertItem.classList.remove('text-green-500');
                alertItem.classList.add('text-red-500');
                alertItem.innerHTML = result.error;
                alertItem.classList.remove('hidden');
            }
        } else {
            alertItem.classList.remove('text-green-500');
            alertItem.classList.add('text-red-500');
            alertItem.innerHTML = result.error;
            alertItem.classList.remove('hidden');
        }
    } catch (error) {
        // Handle any errors
        console.error('Error:', error);
        alert('An error occurred while verifying OTP. Please try again.');
    } finally {
        // Reset the UI
        const verifyOtpButton = document.getElementById('verify-otp');
        verifyOtpButton.innerHTML = 'Verify';
        verifyOtpButton.disabled = false;
        otpInputs.forEach(input => {
            input.value = '';
        });
    }
}

// Handle Resending
async function resendOTP() {
    try {
        // Get the phone number from the OTP fields
        const phoneOrEmail = localStorage.getItem('phone');
        const otpDeliveryChannel = localStorage.getItem('otpDelChnl');

        // Validate phone number
        if (!phoneOrEmail) {
            alert('Phone number or Email is missing.');
            return;
        }

        // Disable the Resend OTP button
        const button = document.getElementById('resend-otp');
        button.innerHTML = 'Resending...';
        button.disabled = true;

        let alertItem = document.getElementById('signin-modal-alert')
        if (!alertItem.classList.contains('hidden')) {
            alertItem.classList.add('hidden');
        }

        const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(phoneOrEmail);
        const data = {
            otpDeliveryChannel: otpDeliveryChannel
        }
        isEmail ? data.email = phoneOrEmail : data.phone = phoneOrEmail;

        // Call the helper function
        const result = await sendOTPRequest(data);

        // Handle the response
        if (result.phoneOrEmail) {
            console.log('OTP resent successfully:', result);
            alertItem.classList.remove('text-red-500');
            alertItem.classList.add('text-green-500');
            alertItem.innerHTML = 'OTP sent successfully.';
            alertItem.classList.remove('hidden');
        } else {
            alertItem.classList.remove('text-green-500');
            alertItem.classList.add('text-red-500');
            alertItem.innerHTML = 'Failed to resend OTP. Please try again.';
            alertItem.classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error in resendOTP:', error);
        let alertItem = document.getElementById('signin-modal-alert')
        alertItem.classList.remove('text-green-500');
        alertItem.classList.add('text-red-500');
        alertItem.innerHTML = 'Failed to resend OTP. Please try again.';
        alertItem.classList.remove('hidden');
    } finally {
        // Reset the button state
        const button = document.getElementById('resend-otp');
        button.innerHTML = 'Resend OTP';
        button.disabled = false;
    }
}

//otp inputs handling
function handleOtpInput(event) {
    const input = event.target;
    const value = input.value;

    // Validate the input: allow only numeric values
    if (!/^\d$/.test(value)) {
        input.value = ""; // Clear invalid input
        return;
    }

    const otpInputs = document.querySelectorAll(".otp-input");
    const currentIndex = Array.from(otpInputs).indexOf(input);

    // Move to the next input if it exists
    const nextInput = otpInputs[currentIndex + 1];
    if (nextInput) {
        nextInput.focus();
    }
}

function handleOtpKeyDown(event) {
    const input = event.target;
    const otpInputs = document.querySelectorAll(".otp-input");
    const currentIndex = Array.from(otpInputs).indexOf(input);

    if (event.key === "Backspace") {
        // Move to the previous input on backspace if empty
        if (input.value === "" && currentIndex > 0) {
            const previousInput = otpInputs[currentIndex - 1];
            previousInput.focus();
        }
    }
}

function handleOtpPaste(event) {
    event.preventDefault(); // Prevent default paste behavior

    const pasteData = event.clipboardData.getData("text").replace(/\D/g, ""); // Only numeric
    const otpInputs = document.querySelectorAll(".otp-input");

    if (pasteData.length === otpInputs.length) {
        otpInputs.forEach((input, idx) => {
            input.value = pasteData[idx] || ""; // Assign pasted values
        });

        // Move focus to the last input
        otpInputs[otpInputs.length - 1].focus();
    }
}

// Assign event listeners to all OTP inputs
const otpInputs = document.querySelectorAll(".otp-input");

otpInputs.forEach((input) => {
    input.addEventListener("input", handleOtpInput);
    input.addEventListener("keydown", handleOtpKeyDown);
    input.addEventListener("paste", handleOtpPaste);
});

// Fetch country codes from the Laravel route
async function loadCountryCodes() {
    try {
        const response = await fetch('/country-codes');
        if (!response.ok) {
            throw new Error('Failed to load country codes.');
        }

        const countryCodes = await response.json();
        populateCountryCodeDatalist(countryCodes);
    } catch (error) {
        console.error('Error loading country codes:', error);
    }
}

// Populate the datalist with country codes
function populateCountryCodeDatalist(codes) {
    const datalist = document.getElementById('countryCodes');
    codes.forEach(code => {
        const option = document.createElement('option');
        option.value = code.dial_code;
        option.textContent = `${code.name} (${code.dial_code})`;
        datalist.appendChild(option);
    });
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', loadCountryCodes);
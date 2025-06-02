// API URL for user registration
const apiRegisterUrl = 'http://localhost:3000/api/Accounts';

// Function to handle form submission
async function submitRegister(event) {
    event.preventDefault(); // Prevent default form submission
    console.log("Form submission intercepted");

    // Collect form data
    const username = document.getElementById('username').value;
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('newPass').value;
    const confirmPassword = document.getElementById('confNewPass').value;

    // Password validation pattern
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Validation checks
    if (!username || !firstname || !lastname || !phone || !email || !password || !confirmPassword) {
        await Swal.fire({
            icon: 'warning',
            title: 'Missing Fields',
            text: 'Please fill in all fields.'
        });
        return;
    }

    if (!email.includes('@') || !email.includes('.')) {
        await Swal.fire({
            icon: 'error',
            title: 'Invalid Email',
            text: 'Please enter a valid email address.'
        });
        return;
    }

    if (password !== confirmPassword) {
        await Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'Passwords do not match!'
        });
        return;
    }

    if (!passwordPattern.test(password)) {
        await Swal.fire({
            icon: 'warning',
            title: 'Weak Password',
            html: 'Password must be at least <b>8 characters</b> long and contain <b>letters, numbers, and special characters</b>.'
        });
        return;
    }

    const payload = {
        username,
        firstname,
        lastname,
        phonenumber: phone,
        email,
        password
    };

    try {
        const response = await fetch(apiRegisterUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });
        console.log(response);
        // Handling the response
        if (response.ok) {
            await Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                text: 'Please check your email to verify your account.',
                timer: 2000,
                showConfirmButton: false
            });

            window.location.href = `/verify-otp?email=${encodeURIComponent(email)}`;
        } else {
            const error = await response.json();
            await Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: error.message || 'Please try again.'
            });
        }
    } catch (error) {
        console.error('Error during registration:', error);
        await Swal.fire({
            icon: 'error',
            title: 'Error',
            text: error.message || 'Unexpected error occurred during registration.'
        });
    }
}

// Add event listener on DOMContentLoaded to attach submit event
document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', submitRegister);
    } else {
        console.error("Register form not found");
    }
});

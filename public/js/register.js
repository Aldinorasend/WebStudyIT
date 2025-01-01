const apiRegisterUrl = 'http://localhost:3000/api/Accounts';

function togglePassword(fieldId, icon) {
    const input = document.getElementById(fieldId);
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

async function submitRegister(event) {
    event.preventDefault(); // Prevent default form submission

    const username = document.getElementById('username').value;
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('newPass').value;
    const confirmPassword = document.getElementById('confNewPass').value;

    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!username || !firstname || !lastname || !phone || !email || !password || !confirmPassword) {
        alert("Please fill in all fields.");
        return;
    }

    if (!email.includes('@') || !email.includes('.')) {
        alert("Invalid email address.");
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    if (!passwordPattern.test(password)) {
        alert("Password must be at least 8 characters long and contain letters, numbers, and special characters.");
        return;
    }

    try {
        const payload = {
            username,
            firstname,
            lastname,
            phonenumber: phone,
            email,
            password
        };

        const response = await fetch(apiRegisterUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        if (response.ok) {
            alert('Registration successful! Redirecting to login...');
            window.location.href = '/login';
        } else {
            const error = await response.json();
            alert('Registration failed: ' + (error.message || 'Please try again.'));
        }
    } catch (error) {
        console.error('Error during registration:', error);
        alert('Error during registration: ' + error.message);
    }
}

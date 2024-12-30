// URL API untuk mengirim permintaan reset password
const apiForgotPassUrl = 'http://localhost:3000/api/Accounts/request-reset';

// Mengambil form dan input email
const form = document.getElementById('forgot-password-form');
const emailInput = document.getElementById('email').value;

// Mengirimkan permintaan untuk reset password
form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Mencegah form agar tidak submit secara default

    const email = emailInput;
    if (!email) {
        alert("Please enter a valid email.");
        return;
    }

    try {
        const response = await fetch(apiForgotPassUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email: email }),
        });

        const result = await response.json();
        if (response.ok) {
            alert('Reset email sent! Please check your inbox.');
            // Redirect user to login page or any other page
            window.location.href = 'login.html';
        } else {
            alert('Error: ' + result.error || 'An error occurred.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to send reset email. Please try again later.');
    }
});

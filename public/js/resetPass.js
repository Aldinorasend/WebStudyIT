document.getElementById('reset-password-form').addEventListener('submit', async (e) => {
    e.preventDefault(); // Mencegah pengiriman form default

    // Ambil nilai dari input form
    const password = document.getElementById('password').value;
    const confPassword = document.getElementById('confPassword').value;

    // Validasi: pastikan password dan konfirmasi cocok
    if (password !== confPassword) {
        alert('Passwords do not match!');
        return;
    }

    // Ambil token dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('token'); // Token reset password dari URL

    if (!token) {
        alert('Invalid or missing token.');
        return;
    }

    try {
        // Kirim permintaan ke server
        const response = await fetch(`http://localhost:3000/api/Accounts/reset-password/${token}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ newPassword: password }),
        });

        const result = await response.json();

        if (response.ok) {
            alert('Password reset successfully! Redirecting to login...');
            window.location.href = '/login'; // Arahkan pengguna ke halaman login
        } else {
            alert('Error: ' + (result.error || 'Failed to reset password.'));
        }
    } catch (err) {
        console.error('Error:', err);
        alert('An unexpected error occurred. Please try again later.');
    }
});
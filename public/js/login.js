const apiLoginUrl = 'http://localhost:3000/api/login'; // Ganti dengan endpoint API login Anda

async function submitLogin() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        alert('Please fill in all fields.');
        return;
    }

    try {
        // Membuat payload
        const payload = {
            email: email,
            password: password
        };

        // Mengirim permintaan ke API login
        const response = await fetch(apiLoginUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        // Mengecek apakah login berhasil
        if (response.ok) {
            const data = await response.json();
            alert('Login successful! Redirecting...');
            
            // Menyimpan token ke localStorage (jika ada)
            if (data.token) {
                localStorage.setItem('authToken', data.token);
            }

            // Redirect ke dashboard atau halaman lain
            window.location.href = '/students/index'; // Ganti dengan halaman tujuan setelah login
        } else {
            const error = await response.json();
            alert('Login failed: ' + (error.message || 'Invalid credentials'));
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('Error during login: ' + error.message);
    }
}

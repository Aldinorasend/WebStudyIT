const apiLoginUrl = 'http://localhost:3000/api/Accounts/search';

async function submitLogin() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const loginButton = document.querySelector('.login-button'); // Tombol login

    if (!email || !password) {
        alert('Please fill in all fields.');
        return;
    }

    try {
        const payload = {
            email: email,
            password: password
        };

        const response = await fetch(apiLoginUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        if (response.ok) {
            const data = await response.json();
            alert('Login successful! Redirecting...');

            // Menyimpan token dan id ke localStorage
            if (data.token) {
                localStorage.setItem('authToken', data.token);
            }
            if (data.id) {
                loginButton.setAttribute('data-id', data.id);
                localStorage.setItem('userId', data.id);
            }

            // Redirect berdasarkan user_type
            if (data.User_Type === 'Admin') {
                console.log(data.id);
                window.location.href = `/admin/dashboard/${data.id}`;
            } else if (data.User_Type === 'Free' || data.User_Type === 'Subscriber') {
                window.location.href = `/students?id=${data.id}`;
            } else {
                console.log('User type is not recognized.');
            }

        } else {
            const error = await response.json();
            alert('Login failed: ' + (error.message || 'Invalid credentials'));
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('Error during login: ' + error.message);
    }
}

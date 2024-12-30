const apiRegisterUrl = 'http://localhost:3000/api/Accounts'; // Ganti dengan endpoint API registrasi Anda

async function submitRegister() {
    event.preventDefault(); // Mencegah form melakukan submit default

    // Mengambil nilai input
    const username = document.getElementById('name').value;
    const firstname = document.querySelectorAll('#name')[1].value; // Mengambil input First Name
    const lastname = document.querySelectorAll('#name')[2].value;  // Mengambil input Last Name
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('newPass').value;
    const confirmPassword = document.getElementById('confNewPass').value;

    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!username || !firstname || !lastname || !phone || !email || !password || !confirmPassword){
        alert("Please fill in all fields.");
        return;
    }

    if (!email.includes('@') || !email.includes('.')){
        alert("Invalid email address.");
        return;
    }

    if (value.startsWith('@') || value.endsWith('@') || value.endsWith('.')) {
        return 'Enter a valid email address.';
    }

    // Validasi password dan konfirmasi password
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    if (!passwordPattern.test(password) && !passwordPattern.test(confirmPassword)){
        alert("Password must be at least 8 characters long and contain letters, numbers, and special characters.");
        return;
    }

    try {
        // Membuat payload untuk permintaan POST
        const payload = {
            username: username,
            firstname: firstname,
            lastname: lastname,
            phonenumber: phone,
            email: email,
            password: password
        };

        // Mengirim permintaan ke API registrasi
        const response = await fetch(apiRegisterUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        // Memproses respons dari API
        if (response.ok) {
            const data = await response.json();
            alert('Registration successful! Redirecting to login...');
            
            // Redirect ke halaman login
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

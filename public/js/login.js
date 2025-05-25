const apiLoginUrl = 'http://localhost:3000/api/Accounts/search';

function togglePassword() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}

function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
}

function getCookie(name) {
    const cookies = document.cookie.split(';');
    for (const cookie of cookies) {
        const [key, val] = cookie.trim().split('=');
        if (key === name) {
            return val;
        }
    }
    return null;
}

function deleteCookie(name) {
    document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}

async function submitLogin() {
    const loginInput = document.getElementById('loginInput').value;
    const password = document.getElementById('password').value;
    const rememberMe = document.getElementById('checkbox').checked;

    if (!loginInput || !password) {
        await Swal.fire({
            icon: 'warning',
            title: 'Missing Fields',
            text: 'Please fill in all fields.'
        });
        return;
    }

    try {
        const isEmail = loginInput.includes('@');
        const payload = {
            email: isEmail ? loginInput : null,
            username: !isEmail ? loginInput : null,
            password
        };

        const response = await fetch(apiLoginUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        if (response.ok) {
            const data = await response.json();

            await Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: 'Redirecting...',
                timer: 1500,
                showConfirmButton: false
            });

            if (data.token) {
                localStorage.setItem('authToken', data.token);
            }
            if (data.id) {
                localStorage.setItem('userId', data.id);
            }

            // Set "Remember Me" cookie
            if (rememberMe) {
                setCookie('rememberUser', loginInput, 30);
            } else {
                deleteCookie('rememberUser');
            }

            if (data.twofa_secret) {
                localStorage.setItem('pending2FA', 'true');
                localStorage.setItem('userEmail', data.email);
                localStorage.setItem('userId', data.id);
                localStorage.setItem('userType', data.User_Type);

                window.location.href = `/verify-twofactor`;
                return;
            }

            const idAkun = data.id;
            if (data.User_Type === 'Admin') {
                window.location.href = `/admin/${idAkun}/dashboard`;
            } else if (data.User_Type === 'Free' || data.User_Type === 'Subscriber') {
                window.location.href = `/students/${idAkun}/dashboard`;
            } else {
                console.log('User type is not recognized.');
            }
        } else {
            const error = await response.json();
            await Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: error.message || 'Invalid credentials'
            });
        }
    } catch (error) {
        console.error('Error during login:', error);
        await Swal.fire({
            icon: 'error',
            title: 'Login Error',
            text: error.message || 'Unexpected error occurred during login.'
        });
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const rememberedUser = getCookie('rememberUser');
    if (rememberedUser) {
        document.getElementById('loginInput').value = rememberedUser;
        document.getElementById('checkbox').checked = true;
    }
});

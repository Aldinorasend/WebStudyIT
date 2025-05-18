<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - StudyIT</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styleOtp.css')); ?>">
</head>

<body>
    <div class="otp-container">
        <h1>Verify Your Account</h1>
        <h3>Enter the 6-digit code sent to your email</h3>

        <div id="alert-message" class="alert" style="display: none;"></div>

        <form id="otp-verification-form">
            <input type="hidden" id="email">
            <div class="otp-inputs">
                <input type="text" class="otp-input" maxlength="1" autofocus>
                <input type="text" class="otp-input" maxlength="1">
                <input type="text" class="otp-input" maxlength="1">
                <input type="text" class="otp-input" maxlength="1">
                <input type="text" class="otp-input" maxlength="1">
                <input type="text" class="otp-input" maxlength="1">
            </div>

            <div class="button-container">
                <button type="submit" class="verify-button">Verify OTP</button>
            </div>

            <div class="resend-container">
                <p>Didn't receive code? <a href="#" id="resend-otp">Resend OTP</a></p>
                <p id="countdown" style="display: none;">Resend in <span id="timer">60</span>s</p>
            </div>
        </form>
    </div>

    <script>
        const apiOtpUrl = 'http://localhost:3000/api/Accounts/verify-otp';
        const apiResendOtpUrl = 'http://localhost:3000/api/Accounts/resend-otp';
        
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('otp-verification-form');
            const inputs = document.querySelectorAll('.otp-input');
            const resendButton = document.getElementById('resend-otp');
            const countdownElement = document.getElementById('countdown');
            const timerElement = document.getElementById('timer');
            const alertMessage = document.getElementById('alert-message');
            const hiddenEmailInput = document.getElementById('email');

            function getEmailFromUrl(){
                const params = new URLSearchParams(window.location.search);
                return params.get('email' || '');
            }
            const emailFromUrl = getEmailFromUrl();
            hiddenEmailInput.value = emailFromUrl;
            console.log('email:',emailFromUrl);

            // Focus and navigation between OTP inputs
            inputs.forEach((input, index) => {
                input.addEventListener('keyup', function(e) {
                    if (e.key >= 0 && e.key <= 9) {
                        inputs[index].value = e.key;
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                        e.preventDefault();
                    } else if (e.key === 'Backspace') {
                        inputs[index].value = '';
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                        e.preventDefault();
                    }
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowRight' && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    } else if (e.key === 'ArrowLeft' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });

                // Paste OTP functionality
                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text').trim();
                    if (pasteData.length === inputs.length && /^\d+$/.test(pasteData)) {
                        for (let i = 0; i < inputs.length; i++) {
                            inputs[i].value = pasteData[i];
                        }
                    }
                });
            });

            // Form submit handler
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = emailFromUrl;

                // Collect OTP values
                let otpValue = '';
                inputs.forEach(input => {
                    otpValue += input.value;
                });

                // Validate OTP length
                if (otpValue.length !== 6) {
                    showAlert('Please enter a valid 6-digit OTP', 'error');
                    return;
                }

                // Send OTP verification request
                fetch(apiOtpUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: email,
                            otp: otpValue
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message?.toLowerCase().includes('verified')) {
                            showAlert('OTP verified successfully! Redirecting...', 'success');
                            setTimeout(() => {
                                window.location.href = '/login';
                            }, 1500);
                        } else {
                            showAlert(data.error || 'Invalid OTP. Please try again.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('Error verifying OTP. Please try again.', 'error');
                    });
            });

            // Resend OTP handler
            resendButton.addEventListener('click', function(e) {
                e.preventDefault();

                const email = emailFromUrl;

                if (!email) {
                    showAlert('Email is required for resending OTP', 'error');
                    return;
                }

                startCountdown();

                // Send request to resend OTP
                fetch(apiResendOtpUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            showAlert('OTP has been resent to your email', 'success');
                        } else {
                            showAlert('Error resending OTP. Please try again.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('Error resending OTP. Please try again.', 'error');
                    });
            });

            // Show alert message
            function showAlert(message, type) {
                alertMessage.textContent = message;
                alertMessage.className = 'alert';
                alertMessage.classList.add(`alert-${type}`);
                alertMessage.style.display = 'block';

                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 5000);
            }

            // Countdown timer for resend OTP
            function startCountdown() {
                let timeLeft = 60;
                resendButton.style.display = 'none';
                countdownElement.style.display = 'block';
                timerElement.textContent = timeLeft;

                const countdownTimer = setInterval(() => {
                    timeLeft--;
                    timerElement.textContent = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(countdownTimer);
                        resendButton.style.display = 'inline';
                        countdownElement.style.display = 'none';
                    }
                }, 1000);
            }
        });
    </script>
</body>

</html><?php /**PATH C:\Users\harit\OneDrive\Documents\GitHub\WebStudyIT\resources\views/auth/otp.blade.php ENDPATH**/ ?>
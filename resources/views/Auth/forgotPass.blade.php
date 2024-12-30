<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link rel="stylesheet" href="{{ asset('css/styleforgotpass.css') }}">
</head>

<body>
    <form id="reset-pass-form">
        <h1>Forgot Your Password?</h2>
            <h3>Enter your email for verification</h3>
            <form action="">
                <div class="form-container">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" , id="email">
                    </div>
                    <div class="button-container">
                        <button class="confirm-button"><a href="/login">Confirm</a></button>
                    </div>
                </div>
            </form>
    </>
</body>

</html>
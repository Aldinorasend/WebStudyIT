<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to StudyIT</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelogin.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="login-container">
        <h1>Login to StudyIT</h1>
        <h5>Please Enter Your Information Below</h5>
        <form id="loginForm">
            <div class="forms">
                <div>
                    <label for="loginInput ">Email or Username</label>
                    <input type="text" id="loginInput" required>
                </div>
                <div class="password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" required>
                </div>
            </div>
            <div class="options">
                <input type="checkbox" id="checkbox" name="remember">
                <label for="checkbox">Remember Me</label>

                <a href="/forgot-password">Forgot Password?</a>
            </div>
            <div class="button-container">
                <button type="button" class="login-button" onclick="submitLogin()" data-id="">Login</button>
            </div>
        </form>
    </div>
    <script src="<?php echo e(asset('js/login.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\laragon\www\WebStudyIT\resources\views/Auth/login.blade.php ENDPATH**/ ?>
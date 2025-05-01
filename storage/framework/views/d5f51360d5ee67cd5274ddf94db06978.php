<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content'); ?>
    <h2 id="welcome-message" class="text-textColorLight font-bold text-3xl">Loading...</h2>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const pathSegments = window.location.pathname.split('/'); // Memisahkan URL berdasarkan '/'
        const idValue = parseInt(pathSegments[2], 10);             
        const apiUrlAdmin = `http://localhost:3000/api/Accounts/${idValue}`;
    
            fetch(apiUrlAdmin)
                .then(response => response.json())
                .then(data => {
                    const username = data.username;
                    document.getElementById("welcome-message").textContent = `Welcome Back, ${username}`;
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/Admin/index.blade.php ENDPATH**/ ?>
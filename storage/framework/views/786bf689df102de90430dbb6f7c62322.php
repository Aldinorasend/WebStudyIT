<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Sidebar Section -->
    <div class="container flex flex-row text-start  text-textColorLight">
        <div class="sidebar flex flex-col bg-sideBarLight w-56 h-full shadow-lg  py-4 px-2  text-textColorLight  border-x-slate-900  fixed top-0 right-0 left-0 justify-between">
            <div class="brand flex items-center ml-4">
                <div class="brand-logo">
                    <img class="size-6" src="<?php echo e(asset('image/logo.png')); ?>" alt="">
                </div>
                <div class="brand-title mx-3">
                    <h1 class="text-2xl font-sans font-bold text-titleColorLight">StudyIT</h1>
                </div>
                <div class="btnLogout">
                    <button onclick="window.location.href='/'" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="maincontent text-start mt-6 h-fit  gap-3 flex flex-col ">
                
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>

                                <a href="dashboard">Dashboard</a>
                            </li>
                        </div>
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>

                                <a href="mycourse">My Course</a>
                            </li>
                        </div>
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                </svg>
                                </svg>
                                <a href="savedcourse">Saved Course</a>
                            </li>
                        </div>
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>

                                <a href="moduls">Certificate</a>
                            </li>
                        </div>
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                            </svg>

                                <a href="transaction">Transaction</a>
                            </li>
                        </div>
               
            </div>
            <hr class="border-slate-900 mx-4 my-3 ">
                <div class="list-settings  ">
                    <ul class="flex flex-col">
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-end">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                <a href="/">Help Center</a>
                            </li>
                        </div>
                        <div class="btn border-2 border-transparent py-3 hover:bg-textColorLight p-3 hover:text-hoverLight  hover:rounded-lg active:bg-activeLight ">
                            <li class="flex flex-row text-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                                <a href="profiles">Settings</a>
                            </li>
                        </div>
                    </ul>
                </div>
        </div>
    
        <div class="content ml-56 w-full">
            <h1 class="text-textColorLight px-6 pt-6 font-bold text-3xl"><?php echo $__env->yieldContent('content-title'); ?></h1>
            <div class="content-body mt-5">
              <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const currentLocation = window.location.pathname; // Dapatkan path URL saat ini
        const pathSegments = currentLocation.split('/'); // Pisahkan berdasarkan "/"
        const akunId = pathSegments[2]; // Ambil ID akun dari path (misal: /admin/2)

        const menuItems = document.querySelectorAll('.btn'); // Ambil semua elemen dengan class .btn

        console.log("Current Path:", currentLocation);

        menuItems.forEach(item => {
            const link = item.querySelector('a'); // Ambil elemen <a> dalam .btn
            if (link) {
                // Tambahkan akunId ke dalam href jika tersedia
                if (akunId) {
                    link.href = `/students/${akunId}/${link.getAttribute('href')}`;
                }

                const linkPath = new URL(link.href, window.location.origin).pathname; // Normalisasi href
                // console.log("Checking:", linkPath);

                // Aktifkan menu jika path cocok
                if (currentLocation.startsWith(linkPath)) {
                    item.classList.add('bg-activeLight', 'text-hoverLight', 'rounded-lg', 'font-medium');
                }

                // console.log(`Active Menu: ${linkPath}`);
            }
        });
    
    });
    </script>

    

</body>

</html>
<?php /**PATH D:\laragon\www\WebStudyIT\resources\views/layouts/user.blade.php ENDPATH**/ ?>
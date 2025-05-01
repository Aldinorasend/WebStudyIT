<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIT | Find your way in a Good Way</title>
    @vite('resources/css/app.css')
</head>

<body>

    <!-- Navbar  -->
    <header>
    <nav class="w-full bg-sideBarLight px-10 py-4 flex flex-col">
        <div class="main-nav justify-between flex flex-row items-center">
            <div class="brand flex flex-row items-center">
                <img src="{{asset('image/logo.png')}}" alt="" class="size-8">
                <h1 class="text-2xl font-bold text-textColorLight ml-2">StudyIT</h1>
            </div>  
            <div class="nav-search flex flex-row items-center gap-4 mr-96">
                    <div class="ai-button">
                        <button class="ai-button flex flex-row items-center gap-2 bg-white text-textColorLight outline-2 outline-textColorLight rounded-md text-center px-3 py-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                            </svg>

                            <p>Ask AI</p>
                            
                        </button>
                    </div>

                    <div class="search-bar rounded-md w-fit border-2 border-textColorLight px-2 py-1 flex flex-row items-center gap-2">
                        <input type="text" placeholder="Search" class="bg-transparent focus:outline-none" id="searchInput">
                        <button onclick="search()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M8.25 10.875a2.625 2.625 0 1 1 5.25 0 2.625 2.625 0 0 1-5.25 0Z" />
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z" clip-rule="evenodd"  />
                            </svg>
                        </button>
                    </div>
            </div>
            <div class="nav-user flex flex-row items-center center gap-10">
                    <div class="nav-button flex flex-row gap-x-6 mt-2 items-center">
                        <div class="message">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                            </button>

                        </div>
                        <div class="notification">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                </svg>

                            </button>
                        </div>
                    </div>
                    <div class="profile">
                        <button class="flex flex-row gap-2 items-center">
                        <img src="{{asset('image/profile.png')}}" alt="" class="size-7 rounded-md">
                        <h1 class="text-lg font-semibold">{{ $students->username }}</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                            </svg>
                        </button>

                    </div>
            </div>
        </div>
        <div class="second-nav pt-5">
            <div class="nav-link flex flex-row items-start">
                <ul class=" flex flex-row items-start gap-5 ">
                    <li><a href="" class="nav-item  hover:bg-black hover:outline-offset-2 hover:outline-violet-500">Home</a></li>
                    <li><a href="">My Learning</a></li>
                    <li><a href="">Catalog</a></li>
                    
                </ul>
            </div>
        </div>

        <!-- Tombol toggle hanya muncul di layar kecil -->
        <!-- <div class="buttonMob flex flex-row gap-4 items-center">
            
            <button onclick="toggleMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 md:hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div> -->
        
        <!-- Navbar di layar besar & Sidebar di layar kecil -->
        <!-- <div class="nav-menu fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center md:static md:w-auto md:h-auto md:shadow-none md:bg-transparent md:gap-96  md:flex-row-reverse md:translate-x-0">
            <div class="nav-profile flex flex-row gap-3 absolute top-5 md:static items-center">
                <img src="{{asset('image/profile.png')}}" alt="" class="size-8 rounded-full">
                <h1 class="text-lg font-semibold">{{ $students->username }}</h1>
            </div>
            <div class="nav-list justify-center text-center md:text-left items-center">
                <ul class="text-lg font-semibold space-y-4 md:space-y-0 md:flex md:gap-7">
                    <li><a href="#" class="block px-4 py-2">Home</a></li>
                    <li><a href="#" class="block px-4 py-2">My Learning</a></li>
                    <li><a href="#" class="block px-4 py-2">Course</a></li>
                  
                </ul>
            </div>
        </div> -->
    </nav>
</header>

    <!-- <header>
        <div class="navbar" id="home">
            <div class="container-fluid">
                <div class="nav-brand">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo">
                    <h1>StudyIT</h1>
                </div>
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <div class="nav-menu">
                    <div class="nav-list">
                        <ul>
                            <li>
                                <span>
                                    <a href="#home">Home</a>
                                </span>
                            </li>
                            <li>
                                <a href="#bootcamp">Bootcamp</a>
                            </li>
                            <li>
                                <a href="/page/contactus.html">Contact Us</a>
                            </li>
                            <li>
                               <div class="dropdown">
                                <button class="dropdown-toggle"> {{ $students->username }}</button>
                                <div class="dropdown-content">
                                    <a href="editprofile.html">Edit Profile</a>
                                    <a href="/">Logout</a>
                                </div>
                               </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- End Navbar Section -->

    <!-- CTA Section -->
    <!-- <main>
        <div class="hero">
            <div class="content">
                <h1>Join The Next Generation Of</h1>
                <h1><span>Tech Innovators</span></h1>
                <h2>Learn the skills you need to succeed in the it industry in just 12 weeks</h2>
                <input class="btn btn-primary btn-lg" id="cta" type="submit" value="Enroll" onclick="navigatePayment()">
            </div>
            <div class="content-image">
                <img src="{{ asset('image/landing.png') }}" alt="" class="img-content">
            </div>
        </div>
          <div class="bootcamp-container">
            <h1 class="bootcamp" id="bootcamp">Courses</h1>
            <div class="row">
                <div class="container" id="course-container">
                    <div class="card" id="course-template" style="width: 18rem; display: none;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-title"></p>
                            <p class="card-level"></p>
                            <div class="date-container">
                                <img src="{{ asset('image/date.png') }}" alt="Date Icon">
                                <p class="date-card"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> -->
    <!-- End Bootcamp Section -->
    <!-- <footer id="footer">
        <div class="container-content-footer">
            <div class="container-logo">
                <img src="{{ asset('image/Group.png') }}" alt="">
            </div>
            <div class="container-footer">
                <h1>StudyIT</h1>
                <div class="container-list">
                    <div class="About-us">
                        <h2>About Us</h2>
                        <div class="content-about">
                            <ul>
                                <li>Team</li>
                                <li>Mission</li>
                                <li>Newsletter</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Support">
                        <h2>Support</h2>
                        <div class="content-support">
                            <ul>
                                <li><a href="..//page/contactus.html">Contact</a></li>
                                <li>FAQ's</li>
                                <li>Subscription</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Socials">
                        <h2>Social</h2>
                        <div class="content-socials">
                            <ul>
                                <li>Instagram</li>
                                <li>Youtube</li>
                                <li>Linkedin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-copyright">
            <div class="copyright">
               
                    <p>© 2024 All Rights Reserved </p>
               
                <span>
                    <p>Terms and Condition</p>
                </span>
            </div>
            <div class="back-top">
                <a href="#home">
                    <p>Back to Top</p>
                </a>
                <img src="{{ asset('image/arrowup.png') }}" alt="">
            </div>
        </div>
        </div>
    </footer> -->
    <script>
    function toggleMenu() {
        const menu = document.querySelector('.nav-menu');
        if (window.innerWidth < 768) { 
            menu.classList.toggle('translate-x-full');
        }
    }

    // Tutup sidebar saat klik di luar
    document.addEventListener("click", function (event) {
        const menu = document.querySelector('.nav-menu');
        const button = document.querySelector('.buttonMob');

        if (window.innerWidth < 768 && !menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add('translate-x-full');
        }
    });

    // Pastikan navbar tetap terlihat di layar besar
    window.addEventListener("resize", function () {
        const menu = document.querySelector('.nav-menu');
        if (window.innerWidth >= 768) {
            menu.classList.remove('translate-x-full');
        }
    });

    function search(){
        alert("Search ditekan! Input: " + document.getElementById("searchInput").value);
        document.getElementById("searchInput").value = ""; // Reset input setelah search
    }
    document.getElementById("searchInput").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        alert("Enter ditekan! Input: " + this.value);
        this.value = ""; // Reset input setelah enter
    }
});
</script>



</body>

</html>

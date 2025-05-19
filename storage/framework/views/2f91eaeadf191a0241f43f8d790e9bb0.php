<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIT | Find your way in a Good Way</title>
    <!-- Google Fonts & Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Tailwind CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="font-poppins text-gray-800 overflow-x-hidden scroll-smooth">
    <header id="home">
        <!-- Navbar -->
        <nav class="fixed top-0 w-full bg-primary z-50 shadow-md transition-all duration-300" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <!-- Logo -->   
                <div class="flex items-center space-x-2">
                    <img src="<?php echo e(asset('image/logo.png')); ?>" alt="StudyIT Logo" class="w-10 h-10">
                    <h1 class="text-2xl font-bold text-titleColorLight" id="logo" >StudyIT</h1>
                </div>

                <!-- Hamburger Menu Button (Mobile) -->
                <button id="hamburger-btn" class="md:hidden text-titleColorLight focus:outline-none">
                    <span class="material-symbols-outlined text-3xl">menu</span>
                </button>

                <!-- Navigation Links -->
                <div id="nav-menu" class="hidden md:flex md:items-center md:space-x-8 absolute md:static top-20 left-0 w-full md:w-auto bg-primary md:bg-transparent flex-col md:flex-row py-6 md:py-0 px-6 md:px-0 space-y-4 md:space-y-0 shadow-lg md:shadow-none transition-all duration-300 z-40">
                    <!-- Menu Items -->
                    <ul class="flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0 text-center md:text-left">
                        <li>
                            <a href="#home" class="text-textColorLight hover:text-activeLight hover:font-semibold hover:transition-all duration-100 font-medium text-lg relative group" id="HomeBtn">
                                Home
                                <span class="absolute left-0 bottom-[-4px] w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#bootcamp" class="text-textColorLight hover:text-activeLight hover:font-semibold hover:transition-all duration-100 font-medium text-lg relative group" id="CourseBtn">
                                Courses
                                <span class="absolute left-0 bottom-[-4px] w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#footer" class="text-textColorLight hover:text-activeLight hover:font-semibold hover:transition-all duration-100  font-medium text-lg relative group" id="ConBtn">
                                Contact Us
                                <span class="absolute left-0 bottom-[-4px] w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Auth Buttons -->
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 md:ml-auto">
                        <a href="/login" class="px-4 py-2 border border-activeLight text-activeLight hover:bg-activeLight hover:text-white font-medium rounded transition duration-300 text-center">Login</a>
                        <a href="/register" class="px-4 py-2 border border-textColorLight text-textColorLight hover:bg-textColorLight hover:text-white font-medium rounded transition duration-300 text-center" id="btnSignUp">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-20">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between">
                <!-- Hero Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-textColorLight mb-2">Join The Next Generation Of</h1>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-activeLight leading-tight mb-4">Tech Innovators</h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0">Learn the skills you need to succeed in the IT industry in just 12 weeks</p>
                    <button id="cta" class="px-8 py-3 bg-textColorLight hover:bg-titleColorLight text-white text-lg font-semibold rounded shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
                        Enroll Now
                    </button>
                </div>
                
                <!-- Hero Image -->
                <div class="w-full lg:w-1/2 flex justify-center">
                    <img src="<?php echo e(asset('image/landing.png')); ?>" alt="Students learning tech skills" class="max-w-full h-auto animate-float">
                </div>
            </div>
        </section>

        <!-- Program Highlights Section -->
        <section class="py-20 bg-gray-50 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Section Title -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-primary inline-block relative">
                        Program Highlights
                        <span class="absolute left-1/2 transform -translate-x-1/2 bottom-[-10px] w-16 h-1 bg-accent"></span>
                    </h2>
                </div>
                
                <!-- Highlights Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Highlight Item 1 -->
                    <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300 transform hover:-translate-y-1 relative">
                        <div class="absolute top-[-15px] left-5 w-8 h-8 bg-titleColorLight text-white rounded-full flex items-center justify-center font-bold">1</div>
                        <h3 class="text-primary font-semibold text-xl mb-2">Updated Curriculum</h3>
                        <p>Learn the latest in-demand technology skills in the industry</p>
                    </div>
                    
                    <!-- Highlight Item 2 -->
                    <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300 transform hover:-translate-y-1 relative">
                        <div class="absolute top-[-15px] left-5 w-8 h-8 bg-titleColorLight text-white rounded-full flex items-center justify-center font-bold">2</div>
                        <h3 class="text-primary font-semibold text-xl mb-2">Experienced Mentors</h3>
                        <p>Get direct guidance from seasoned developers with extensive experience</p>
                    </div>
                    
                    <!-- Highlight Item 3 -->
                    <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300 transform hover:-translate-y-1 relative">
                        <div class="absolute top-[-15px] left-5 w-8 h-8 bg-titleColorLight text-white rounded-full flex items-center justify-center font-bold">3</div>
                        <h3 class="text-primary font-semibold text-xl mb-2">Hands-On Focus</h3>
                        <p>Not just theory! Every module includes real-world projects to sharpen your skills</p>
                    </div>
                    
                    <!-- Highlight Item 4 -->
                    <div class="bg-white p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300 transform hover:-translate-y-1 relative">
                        <div class="absolute top-[-15px] left-5 w-8 h-8 bg-titleColorLight text-white rounded-full flex items-center justify-center font-bold">4</div>
                        <h3 class="text-primary font-semibold text-xl mb-2">Flexible Learning</h3>
                        <p>Designed for everyone—from students to working professionals</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row-reverse items-center justify-between gap-12">
                <!-- Testimonial Content -->
                <div class="w-full lg:w-3/5">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 p-8 rounded-lg shadow-sm mb-8 relative">
                        <span class="absolute top-3 left-3 text-6xl text-primary-light opacity-30 leading-none">"</span>
                        <p class="italic text-lg relative z-10">This bootcamp transformed my career! From having zero tech background, I'm now working as a Junior Developer at a reputable company.</p>
                        <p class="text-right text-primary-dark font-semibold mt-4">- Sinta, Class of 2023</p>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 p-8 rounded-lg shadow-sm relative">
                        <span class="absolute top-3 left-3 text-6xl text-primary-light opacity-30 leading-none">"</span>
                        <p class="italic text-lg relative z-10">The program is clear, mentors are always ready to help, and the curriculum is spot-on. I highly recommend this bootcamp!</p>
                        <p class="text-right text-primary-dark font-semibold mt-4">- Dimas, Class of 2022</p>
                    </div>
                </div>
                
                <!-- Testimonial Title -->
                <div class="w-full lg:w-2/5 text-center lg:text-left">
                    <h2 class="text-3xl sm:text-4xl font-bold text-primary mb-4 relative inline-block">
                        Student Testimonials
                        <span class="absolute left-0 lg:left-0 bottom-[-10px] w-16 h-1 bg-accent"></span>
                    </h2>
                    <p class="text-lg text-gray-600 mt-6">Hear what our graduates have to say about their StudyIT experience</p>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section id="bootcamp" class="py-20 bg-gray-50 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Section Title -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-bold text-primary inline-block relative">
                        Our Courses
                        <span class="absolute left-1/2 transform -translate-x-1/2 bottom-[-10px] w-16 h-1 bg-accent"></span>
                    </h2>
                </div>
                
                <!-- Courses Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="course-container">
                    <!-- Course Card 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 transform hover:scale-[1.15] origin-center" id="course-template">
  <!-- Konten card -->
                        <img src="" class="w-full h-48 object-cover card-img-top"" id="card-img-top" alt="Web Development Course">
                        <div class="p-6 bg-textColorLight flex flex-row justify-between" id = "card-body">
                            <div class="content">
                                <h3 class="font-semibold text-xl text-white mb-4 card-title" id="card-title"></h3>
                                <h5 class="font-semibold text-lg text-white mb-4 card-level" id="card-level"></h3>
                                <div class="flex items-center text-white">
                                    <img src="<?php echo e(asset('image/date.png')); ?>" alt="Date Icon" class="w-5 h-5 mr-2">
                                    <p class = "date-card"></p>
                                </div>
                            </div>
                            <div class="buttonCta ">
                                <button class="border border-sideBarLight hover:bg-titleColorLight text-white p-2  rounded-md">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer" class="bg-textColorLight text-white pt-16 pb-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Footer Content -->
            <div class="flex flex-col lg:flex-row gap-12 mb-12">
                <!-- Logo -->
                <div class="lg:w-1/2">
                    <img src="<?php echo e(asset('image/Group.png')); ?>" alt="StudyIT Logo" class="max-w-full h-auto ml-20">
                </div>
                
                <!-- Links -->
                <div class="lg:w-4/5">
                    <h2 class="text-3xl font-bold mb-8">StudyIT</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                        <!-- About Us -->
                        <div>
                            <h3 class="text-xl font-semibold text-primary-light mb-4">About Us</h3>
                            <ul class="space-y-2">
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Team</li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Mission</li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Newsletter</li>
                            </ul>
                        </div>
                        
                        <!-- Support -->
                        <div>
                            <h3 class="text-xl font-semibold text-primary-light mb-4">Support</h3>
                            <ul class="space-y-2">
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">
                                    <a href="contact-us/">Contact</a>
                                </li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">FAQ's</li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Subscription</li>
                            </ul>
                        </div>
                        
                        <!-- Social -->
                        <div>
                            <h3 class="text-xl font-semibold text-primary-light mb-4">Social</h3>
                            <ul class="space-y-2">
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Instagram</li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Youtube</li>
                                <li class="hover:text-primary-light transition duration-300 cursor-pointer">Linkedin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="border-white/10 mb-8">
            
            <!-- Copyright Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <div class="flex flex-col sm:flex-row gap-4 mb-4 sm:mb-0 text-center sm:text-left">
                    <p>© 2025 All Rights Reserved</p>
                    <p class="hover:text-primary-light transition duration-300 cursor-pointer">Terms and Conditions</p>
                </div>
                <a href="#home" class="flex items-center gap-2 hover:text-primary-light transition duration-300">
                    <p>Back to Top</p>
                    <span class="material-symbols-outlined">keyboard_arrow_up</span>
                </a>
            </div>
        </div>
    </footer>

    <script>
        // Hamburger menu toggle
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            const navMenu = document.getElementById('nav-menu');
            navMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const btnhome = document.getElementById('HomeBtn');
            const btncourse = document.getElementById('CourseBtn');
            const btncontact = document.getElementById('ConBtn');
            const Logo = document.getElementById('logo');
            const btnSignUp = document.getElementById('btnSignUp');
            if (window.scrollY > 50) {
                navbar.classList.add('backdrop-blur-sm');
            } 
             else {
                navbar.classList.remove('backdrop-blur-sm');
            }
            if (window.scrollY > 1900){
                Logo.classList.remove('text-textColorLight');
                btnhome.classList.remove('text-textColorLight');
                btncourse.classList.remove('text-textColorLight');
                btncontact.classList.remove('text-textColorLight');
                btnSignUp.classList.remove('text-textColorLight');
                btnSignUp.classList.remove('border-textColorLight');
                btnSignUp.classList.remove('hover:bg-textColorLight');

                Logo.classList.add('text-white');
                btnhome.classList.add('text-white');
                btncourse.classList.add('text-white');
                btncontact.classList.add('text-white');
                btnSignUp.classList.add('text-white');
                btnSignUp.classList.add('border-white');
                btnSignUp.classList.add('hover:bg-white');
                btnSignUp.classList.add('hover:text-textColorLight');


    
            }else{
                Logo.classList.add('text-textColorLight');
                btnhome.classList.add('text-textColorLight');
                btncourse.classList.add('text-textColorLight');
                btncontact.classList.add('text-textColorLight');
                btnSignUp.classList.add('text-textColorLight');
                btnSignUp.classList.add('border-textColorLight');
                btnSignUp.classList.add('hover:bg-textColorLight');

                Logo.classList.remove('text-white');
                btnhome.classList.remove('text-white');
                btncourse.classList.remove('text-white');
                btncontact.classList.remove('text-white');
                btnSignUp.classList.remove('text-white');
                btnSignUp.classList.remove('border-white');
                btnSignUp.classList.remove('hover:bg-white');
                btnSignUp.classList.remove('hover:text-textColorLight');
            }
        });

        // CTA button action
        document.getElementById('cta').addEventListener('click', function() {
            window.location.href = '/register';
        });

        // Initialize
        // $(document).ready(function() {
        //     // Smooth scrolling for anchor links
        //     $('a[href^="#"]').on('click', function(event) {
        //         event.preventDefault();
        //         $('html, body').animate({
        //             scrollTop: $($(this).attr('href')).offset().top - 70
        //         }, 800);
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function () {
        const apiUrl = 'http://localhost:3000/api/coursesUser'; // Ganti dengan URL API Anda
        const baseUrl = 'http://localhost:8000/backend-uploads/';
        const courseContainer = document.getElementById('course-container');
    const courseTemplate = document.getElementById('course-template');

    // First, check if elements exist
    if (!courseContainer || !courseTemplate) {
        console.error('Required elements not found!');
        return;
    }

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Clear the container first (remove the template)
            courseContainer.innerHTML = '';

            data.forEach(course => {
                const courseCard = courseTemplate.cloneNode(true);
                courseCard.style.display = 'block';
                courseCard.removeAttribute('id'); // Remove the template ID
                courseCard.setAttribute('data-id', course.id);

                // Get elements using more reliable selectors
                const cardImg = courseCard.querySelector('.card-img-top');
                const cardTitle = courseCard.querySelector('.card-title');
                const dateCard = courseCard.querySelector('.date-card');
                const cardLevel = courseCard.querySelector('.card-level');

                // Validate elements before manipulating
                if (!cardImg || !cardTitle || !dateCard) {
                    console.error('One or more elements not found in card template');
                    return;
                }

                // Set content
                cardImg.src = `${baseUrl}${course.image}`;
                cardImg.alt = "Cover course";
                
                // Format level name safely
                const level = course.level ? 
                    course.level.charAt(0).toUpperCase() + course.level.slice(1) : 
                    '';
                
                cardTitle.textContent = `${course.course_name}`;
                cardLevel.textContent = `${level} Class`;
                // Format dates safely
                if (course.start_date && course.end_date) {
                    const startDate = new Date(course.start_date);
                    const endDate = new Date(course.end_date);
                    
                    dateCard.textContent = `${startDate.getDate()} - ${endDate.toLocaleDateString('id-ID', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    })}`;
                } else {
                    dateCard.textContent = 'Date not available';
                }

                courseContainer.appendChild(courseCard);
            });
        })
        .catch(error => {
            console.error('Error fetching courses:', error);
            // Show error message to user
            courseContainer.innerHTML = `
                <div class="text-center py-8 text-red-500">
                    Failed to load courses. Please try again later.
                </div>
            `;
        });
});
    
    </script>
</body>

</html><?php /**PATH C:\Users\alienware\Documents\WebPro\DINO\WebStudyIT\resources\views/index.blade.php ENDPATH**/ ?>
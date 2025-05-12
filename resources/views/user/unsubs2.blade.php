@extends('layouts.user')
@section('title', 'StudyIT')
@section('content-title', 'Dashboard')

@section('content')
<div class="container flex flex-col px-6">
    <!-- Welcome Section User -->
    <section class="mb-10">
        <div
            class="container-user bg-gradient-to-r from-textColorLight to-activeLight p-6 rounded-xl shadow-lg justify-between flex flex-row">
            <div class="greetingtext-white flex flex-col text-white">
                <h1 class="text-2xl font-bold mb-2" id="welcome-message"></h1>
                <p class="">Continue your learning journey with StudyIT</p>
            </div>
            <div class="account-type flex items-center gap-3">
                <button class="text-activeDark font-semibold bg-white border-2 border-white px-3 py-1 rounded-full text-sm hover:bg-white/90 transition-colors shadow-md  hidden" id="btnEnroll">Enroll Now</button>
                <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">Student</span>
                <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm" id = "user_status">Premium Member</span>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="mb-10">
        <div class="container-stats flex flex-row  w-full h-auto gap-4">
            <div
                class="container-course-active bg-white shadow-md hover:shadow-lg w-2/6 h-auto p-5 rounded-md flex flex-row justify-between items-center ">
                <div class="body flex flex-col gap-3">
                    <h2 class="text-md font-semibold text-gray-500">Active Courses</h2>
                        <p class="text-2xl font-bold" id="activecourses">Loading..</p>
                        <a class="text-sm text-blue-400" href="">View all Courses</a>
                </div>
                <div class="icon bg-blue-100 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />                    </svg>

                </div>
            </div>
            <div
                class="overall-progress bg-white/90 shadow-md hover:shadow-lg w-2/6 h-auto p-5 rounded-md flex flex-row justify-between items-center">
                <div class="body flex flex-col gap-3">
                    <h2 class="text-md font-semibold text-gray-500">Overall Progress</h1>
                        <p class="text-2xl font-bold" id="overallprogress">Loading..</p>
                        <a class="text-sm text-blue-400" href="">View all Courses</a>
                </div>
                <div class="bg-green-100 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div
                class="deadline bg-white/90 shadow-md  origin-center transition-all duration-300 transform w-2/6 h-auto p-5 rounded-md flex flex-row justify-between items-center hover:shadow-lg hover:scale-[1.005]">
                <div class="body flex flex-col gap-3">
                    <h2 class="text-md font-semibold text-gray-500" >Upcoming Deadlines</h1>
                        <p class="text-2xl font-bold" id="deadline">Loading..</p>
                        <a class="text-sm text-blue-400" href="">View deadlines</a>
                </div>
                <div class="bg-orange-100 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Current Courses -->
    <section class="mb-10">
        <div class="containet-current-courses mb-5">
            <div class="heading flex flex-row justify-between items-center">
                <h1 class="font-bold text-xl">Your Current Courses</h1>
                <a href="" class="text-blue-600">View all</a>
            </div>
        </div>
        <!-- Courses Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 " id="course-container">
            <!-- Course Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.005] origin-center"
                id="course-template">
                <!-- Konten card -->
                <img src="" class="w-full h-48 object-cover card-img-top" id="card-img-top"
                    alt="Web Development Course">
                <div class="px-4 py-3 bg-gradient-to-r from-textColorLight to-titleColorLight flex flex-col justify-between"
                    id="card-body">
                    <div class="content flex justify-between items-start">
                        <div class="course-content">
                            <h1 class="font-semibold text-lg mb-3 text-white card-title" id="card-title">Web Development</h1>
                                <p class=" text-white mb-3 text-sm  card-level" id="card-level">Intermediate level</p>
                        </div>
                        <div class="buttonCta ">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Active</span>
                        </div>
                    </div>
                    <div class="mt-4">
                    <div class="flex justify-between text-sm text-white mb-1">
    <span>Progress</span>
    <span class="progress-percent">0%</span> <!-- Added class for progress percentage -->
</div>
<div class="w-full bg-white rounded-full h-2">
    <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 0%"></div> <!-- Added progress-bar class -->
</div>
                        <div class="mt-4 flex justify-stretch">
                            <a href="#" class="text-sm text-white hover:underline">Continue Learning</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
       
        // CTA button action
        // document.getElementById('cta').addEventListener('click', function() {
        //     window.location.href = '/register';
        // });


    document.addEventListener('DOMContentLoaded', function () {
        const studentId = window.location.pathname.split('/')[2];
        console.log("studentId:", studentId);
        const courseApi = `http://localhost:3000/api/studentEnrolls/${studentId}`;
        const apiAccount = `http://localhost:3000/api/Accounts/${studentId}`;

        const baseUrl = 'http://localhost:8000/backend-uploads/';
        const courseContainer = document.getElementById('course-container');
        const courseTemplate = document.getElementById('course-template');

        if (!courseContainer || !courseTemplate) {
            console.error('Required elements not found!');
            return;
        }
        fetch(apiAccount)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const username = data.username;
                    console.log("username:", username);
                    document.getElementById("welcome-message").textContent = `Welcome Back, ${username}`;
                    document.getElementById("user_status").textContent = `${data.User_Type} Member`;
                    if(data.User_Type == "Free"){
                        document.getElementById("btnEnroll").classList.remove("hidden");
                    }
                    
                })
                .catch(error => console.error("Error fetching data:", error));

        fetch(courseApi)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                courseContainer.innerHTML = '';

                data.forEach(course => {
                    document.getElementById("deadline").textContent = `${course.total_upcoming_incomplete_courses}`;
                    document.getElementById("activecourses").textContent = `${course.total_active_courses}`;
                    document.getElementById("overallprogress").textContent = `${course.average_progress}%`;
                    const courseCard = courseTemplate.cloneNode(true);
                    courseCard.style.display = 'block';
                    courseCard.removeAttribute('id');
                    courseCard.setAttribute('data-id', course.id);

                    // Get elements
                    const cardImg = courseCard.querySelector('.card-img-top');
                    const cardTitle = courseCard.querySelector('.card-title');
                    const cardLevel = courseCard.querySelector('.card-level');
                    const progressBar = courseCard.querySelector('.progress-bar');
                    const progressPercent = courseCard.querySelector('.progress-percent');

                    if (!cardImg || !cardTitle || !progressBar || !progressPercent) {
                        console.error('Elements not found in card template');
                        return;
                    }

                    // Set content
                    cardImg.src = `${baseUrl}${course.Courses_Image}`;
                    cardImg.alt = "Cover course";
                    
                    const level = course.Courses_Level ? 
                        course.Courses_Level.charAt(0).toUpperCase() + course.Courses_Level.slice(1) : 
                        '';
                    
                    cardTitle.textContent = `${course.Courses_Name}`;
                    cardLevel.textContent = `${level} Class`;
                    
                    // Set progress (assuming course.Progress is a number between 0-100)
                    const progress = course.Progress || 0;
                    progressBar.style.width = `${progress}%`;
                    progressPercent.textContent = `${progress}%`;

                    courseContainer.appendChild(courseCard);
                });
            })
            .catch(error => {
                console.error('Error fetching courses:', error);
                courseContainer.innerHTML = `
                    <div class="text-center py-8 text-red-500">
                        Failed to load courses. Please try again later.
                    </div>
                `;
            });
    });
    
    </script>

@endsection

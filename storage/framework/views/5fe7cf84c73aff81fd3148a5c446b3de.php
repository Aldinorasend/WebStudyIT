<?php $__env->startSection('title', 'StudyIT'); ?>
<?php $__env->startSection('content-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
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
                <button
                    class="text-activeDark font-semibold bg-white border-2 border-white px-3 py-1 rounded-full text-sm hover:bg-white/90 transition-colors shadow-md  hidden"
                    id="btnEnroll" onclick=navigatetoPayment()>Enroll Now</button>
                <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">Student</span>
                <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm" id="user_status">Premium
                    Member</span>
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
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>

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
                    <h2 class="text-md font-semibold text-gray-500">Upcoming Deadlines</h1>
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
                            <h1 class="font-semibold text-lg mb-3 text-white card-title" id="card-title">Web Development
                            </h1>
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
                            <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 0%"></div>
                            <!-- Added progress-bar class -->
                        </div>
                        <div class="mt-4 flex justify-stretch">
                            <a href="#" class="text-sm text-white hover:underline learn-link">Continue Learning</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Courses -->
    <section class="mb-10">
        <div class="containet-current-courses mb-5">
            <div class="heading flex flex-row justify-between items-center">
                <h1 class="font-bold text-xl">Recommended For You</h1>
                <a href="" class="text-blue-600">Browse all courses</a>
            </div>
        </div>
        <!-- Courses Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 " id="all-course-container">
            <!-- Course Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.005] origin-center"
     id="all-course-template" data-id="YOUR_COURSE_ID_HERE" data-student-id="YOUR_STUDENT_ID_HERE">
                <!-- Konten card -->
                <img src="" class="w-full h-48 object-cover all-card-img-top" id="card-img-top"
                    alt="Web Development Course">
                <div class="px-4 py-3 bg-gradient-to-r from-textColorLight to-titleColorLight flex flex-col justify-between"
                    id="all-card-body">
                    <div class="content flex justify-between items-start">
                        <div class="all-course-content">
                            <h1 class="font-semibold text-lg mb-3 text-white all-card-title" id="card-title">Web Development
                            </h1>
                            <p class=" text-white mb-3 text-sm  all-card-level" id="card-level">Intermediate level</p>
                        </div>
                        <div class="buttonCta ">
                            <button class="bg-blue-800 text-white text-xs px-2 py-1 rounded-full btnEnrollNow" id="btnEnrollNow">Enroll Now</button>
                        </div>
                    </div>
                    <div class="all-course-content flex flex-row justify-between  items-center">
                            <a href="" class="text-white text-xs hover:underline view-details">View details </a>
                            <p class=" text-white mb-3 text-sm  all-card-level" id="modul">0 Lesson</p>
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
    const studentId = window.location.pathname.split('/')[2];
    const API_ENROLLED_COURSE = `http://localhost:3000/api/studentEnrolls`;
    const API_ACCOUNT = `http://localhost:3000/api/Accounts`;
    const API_COURSE = `http://localhost:3000/api/coursesUser`;
    const BASE_URL = 'http://localhost:8000/backend-uploads/';
    const API_ENROLL = `http://localhost:3000/api/createEnrolls`;
    

    document.addEventListener('DOMContentLoaded', function () {

        fetchAccount(API_ACCOUNT, studentId);
        fetchEnrolledCourse(API_ENROLLED_COURSE, studentId, BASE_URL);
        fetchAllCourses(API_COURSE, studentId, BASE_URL);
       
        // Use querySelectorAll for multiple elements
// JavaScript
        
    });
    function navigatetoPayment() {
        const studentId = window.location.pathname.split('/')[2];
        window.location.href = `/user/${studentId}/payments`;
    }
    async function enroll(idCourse){
        try      { 
            const studentId = window.location.pathname.split('/')[2];
        
        // Properly await the fetchAccount call
            const data = await fetchAccount(API_ACCOUNT, studentId);
// Now this will work
          
            const API_COURSES_BY_ID = `http://localhost:3000/api/courses/${idCourse}`;
            const courseResponse = await fetch(API_COURSES_BY_ID);
            if (!courseResponse.ok) {
                throw new Error('Network response was not ok');
            }
            const dataCourse = await courseResponse.json();
            
          
            if(data.User_Type == "Free" && (dataCourse.level == "intermediate" || dataCourse.level == "expert")){
                window.location.href = `/user/${studentId}/payments`;
            }else{
                const enrollResponse = await fetch(`${API_ENROLL}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        UserID: studentId,
                        CourseID: idCourse,
                    }),
                });
                if (!enrollResponse.ok) {
                    throw new Error('Network response was not ok');
                }
                const enrollData = await enrollResponse.json();
                console.log(enrollData);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'You have successfully enrolled in the course!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        } catch (error) {
            console.error("Error fetching data:", error);
        }

    }
    async function fetchAccount(API_ACCOUNT, studentId) {
        try {
            const response = await fetch(`${API_ACCOUNT}/${studentId}`);
            const url = `${API_ACCOUNT}/${studentId}`;

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the JSON data
            const data = await response.json();
       
            // Update the UI with the fetched data
            const username = data.username;
            document.getElementById("welcome-message").textContent = `Welcome Back, ${username}`;
            document.getElementById("user_status").textContent = `${data.User_Type} Member`;
            if (data.User_Type == "Free") {
                document.getElementById("btnEnroll").classList.remove("hidden");
            }
            return data;
        } catch (error) {
            console.error("Error fetching data:", error);
        }

    }
    async function fetchEnrolledCourse(API_ENROLLED_COURSE, studentId, BASE_URL) {
    const courseContainer = document.getElementById('course-container');
    const courseTemplate = document.getElementById('course-template');
    try {
        const response = await fetch(`${API_ENROLLED_COURSE}/${studentId}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        courseContainer.innerHTML = '';
        const data = await response.json();
        const coursesToShow = data.slice(0, 3);
        console.log("Enrolled Course data: ", data);

        coursesToShow.forEach(course => {
            document.getElementById("deadline").textContent =
                `${course.total_upcoming_incomplete_courses}`;
            document.getElementById("activecourses").textContent = `${course.total_active_courses}`;
            document.getElementById("overallprogress").textContent = `${course.average_progress}%`;
            const courseCard = courseTemplate.cloneNode(true);
            courseCard.style.display = 'block';
            courseCard.removeAttribute('id');
            courseCard.setAttribute('data-id', course.CourseID);

            // Get elements
            const cardImg = courseCard.querySelector('.card-img-top');
            const cardTitle = courseCard.querySelector('.card-title');
            const cardLevel = courseCard.querySelector('.card-level');
            const progressBar = courseCard.querySelector('.progress-bar');
            const progressPercent = courseCard.querySelector('.progress-percent');
            const learnLink = courseCard.querySelector('.learn-link');

            if (!cardImg || !cardTitle || !progressBar || !progressPercent || !learnLink) {
                console.error('Elements not found in card template');
                return;
            }

            // Set content
            cardImg.src = `${BASE_URL}${course.Courses_Image}`;
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
            
            // Modified learnLink handler
            learnLink.onclick = (e) => {
                e.preventDefault();
                window.location.href = `/students/${studentId}/courses/${course.CourseID}?source=continue`;
            };
            
            courseContainer.appendChild(courseCard);
        });

    } catch (error) {
        console.error('Error fetching enrolled courses:', error);
        courseContainer.innerHTML = `
                <div class="text-center py-8 text-red-500">
                    Failed to load courses. Please try again later.
                </div>
            `;
    }
}

async function fetchAllCourses(API_COURSES, studentId, BASE_URL) {
    const courseContainer = document.getElementById('all-course-container');
    const courseTemplate = document.getElementById('all-course-template');
    try {
        const response = await fetch(`${API_COURSES}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        courseContainer.innerHTML = '';
        const data = await response.json();
        console.log("All Courses data: ", data);
        const coursesToShow = data.slice(0, 6);
        coursesToShow.forEach(course => {
            const courseCard = courseTemplate.cloneNode(true);
            courseCard.style.display = 'block';
            courseCard.removeAttribute('id');
            courseCard.setAttribute('data-id', course.id);
            
            // Get elements
            const btnEnroll = courseCard.querySelector('.btnEnrollNow');
            const cardImg = courseCard.querySelector('.all-card-img-top');
            const cardTitle = courseCard.querySelector('.all-card-title');
            const cardLevel = courseCard.querySelector('.all-card-level');
            const viewDetails = courseCard.querySelector('.view-details');

            if (!cardImg || !cardTitle || !btnEnroll || !viewDetails) {
                console.error('Elements not found in card template');
                return;
            }

            // Set content
            cardImg.src = `${BASE_URL}${course.image}`;
            cardImg.alt = "Cover course";

            const level = course.level ?
                course.level.charAt(0).toUpperCase() + course.level.slice(1) :
                '';

            cardTitle.textContent = `${course.course_name}`;
            cardLevel.textContent = `${level} Class`;
            
            btnEnroll.onclick = () => enroll(course.id); 
            
            // Modified viewDetails handler
            viewDetails.onclick = (e) => {
                e.preventDefault();
                window.location.href = `/students/${studentId}/courses/${course.id}`;
            };
            
            courseContainer.appendChild(courseCard);
        });
    } catch (error) {
        console.error('Error fetching all courses:', error);
        courseContainer.innerHTML = `
                <div class="text-center py-8 text-red-500">
                    Failed to load courses. Please try again later.
                </div>
            `;
    }
}
    // DI BAWAH INI CODE DEFAULT SEBELUM ALAN NGEMERGE
    // async function fetchEnrolledCourse(API_ENROLLED_COURSE, studentId, BASE_URL) {
    //     const courseContainer = document.getElementById('course-container');
    //     const courseTemplate = document.getElementById('course-template');
    //     try {
    //         const response = await fetch(`${API_ENROLLED_COURSE}/${studentId}`);
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         courseContainer.innerHTML = '';
    //         const data = await response.json();
    //         const coursesToShow = data.slice(0, 3);
    //         console.log("Enrolled Course data: ", data);

    //         coursesToShow.forEach(course => {
    //             document.getElementById("deadline").textContent =
    //                 `${course.total_upcoming_incomplete_courses}`;
    //             document.getElementById("activecourses").textContent = `${course.total_active_courses}`;
    //             document.getElementById("overallprogress").textContent = `${course.average_progress}%`;
    //             const courseCard = courseTemplate.cloneNode(true);
    //             courseCard.style.display = 'block';
    //             courseCard.removeAttribute('id');
    //             courseCard.setAttribute('data-id', course.CourseID);

    //             // Get elements
    //             const cardImg = courseCard.querySelector('.card-img-top');
    //             const cardTitle = courseCard.querySelector('.card-title');
    //             const cardLevel = courseCard.querySelector('.card-level');
    //             const progressBar = courseCard.querySelector('.progress-bar');
    //             const progressPercent = courseCard.querySelector('.progress-percent');
    //             const learnLink = courseCard.querySelector('.learn-link');

    //             if (!cardImg || !cardTitle || !progressBar || !progressPercent || !learnLink) {

    //                 console.error('Elements not found in card template');
    //                 return;
    //             }

    //             // Set content
    //             cardImg.src = `${BASE_URL}${course.Courses_Image}`;
    //             cardImg.alt = "Cover course";

    //             const level = course.Courses_Level ?
    //                 course.Courses_Level.charAt(0).toUpperCase() + course.Courses_Level.slice(1) :
    //                 '';

    //             cardTitle.textContent = `${course.Courses_Name}`;
    //             cardLevel.textContent = `${level} Class`;

    //             // Set progress (assuming course.Progress is a number between 0-100)
    //             const progress = course.Progress || 0;
    //             progressBar.style.width = `${progress}%`;
    //             progressPercent.textContent = `${progress}%`;
    //             courseCard.addEventListener('click', () => {
    //                 const cId = course.CourseID
    //                 console.log(cId);
    //                 window.location.href = `/students/${studentId}/courses/${course.CourseID}`;
    //             });
    //             // learnLink.href = `/user/${studentId}/courses/${course.id}`;
    //             courseContainer.appendChild(courseCard);
    //         });
    //         // Update the UI with the fetched data

    //     } catch (error) {
    //         console.error('Error fetching enrolled courses:', error);
    //         courseContainer.innerHTML = `
    //                 <div class="text-center py-8 text-red-500">
    //                     Failed to load courses. Please try again later.
    //                 </div>
    //             `;
    //     }
    // }
    // async function fetchAllCourses(API_COURSES, studentId, BASE_URL) {
    //     const courseContainer = document.getElementById('all-course-container');
    //     const courseTemplate = document.getElementById('all-course-template');
    //     try {
            
    //         const response = await fetch(`${API_COURSES}`);
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         courseContainer.innerHTML = '';
    //         const data = await response.json();
    //         console.log("All Courses data: ", data);
    //         const coursesToShow = data.slice(0, 6);
    //         coursesToShow.forEach(course => {
    //             const courseCard = courseTemplate.cloneNode(true);
    //             courseCard.style.display = 'block';
    //             courseCard.removeAttribute('id');
    //             courseCard.setAttribute('data-id', course.id);
                
    //             // Get elements
    //             const btnEnroll = courseCard.querySelector('.btnEnrollNow');
    //             const cardImg = courseCard.querySelector('.all-card-img-top');
    //             const cardTitle = courseCard.querySelector('.all-card-title');
    //             const cardLevel = courseCard.querySelector('.all-card-level');
           
    
    //             if (!cardImg || !cardTitle || !btnEnroll) {
    //                 console.error('Elements not found in card template');
    //                 return;
    //             }
    
    //             // Set content
    //             cardImg.src = `${BASE_URL}${course.image}`;
    //             cardImg.alt = "Cover course";
    
    //             const level = course.level ?
    //                 course.level.charAt(0).toUpperCase() + course.level.slice(1) :
    //                 '';
    
    //             cardTitle.textContent = `${course.course_name}`;
    //             cardLevel.textContent = `${level} Class`;
    
    //             // Set progress (assuming course.Progress is a number between 0-100)
                
    //             btnEnroll.onclick = () => enroll(course.id); 
    //             courseContainer.appendChild(courseCard);
    //             const viewDetails = courseCard.querySelector('.view-details');
    //             viewDetails.onclick = (e) => {
    //                 e.preventDefault();

    //                 const courseId = courseCard.getAttribute('data-id');
    //                 window.location.href = `/students/${studentId}/courses/${courseId}`;
    //                 console.log(`/students/${studentId}/courses/${courseId}`);
    //             };
    //         });
    //     } catch (error) {
    //         console.error('Error fetching all courses:', error);
    //         courseContainer.innerHTML = `
    //                 <div class="text-center py-8 text-red-500">
    //                     Failed to load courses. Please try again later.
    //                 </div>
    //             `;
            
    //     }
    // }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\harit\OneDrive\Documents\GitHub\WebStudyIT\resources\views/user/unsubs2.blade.php ENDPATH**/ ?>
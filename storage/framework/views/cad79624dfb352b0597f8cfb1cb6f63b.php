<?php $__env->startSection('title', 'StudyIT'); ?>
<?php $__env->startSection('content-title', 'Your Current Course'); ?>

<?php $__env->startSection('content'); ?>
<div class="container flex flex-col px-6">
    <!-- Search Bar -->
    <div class="container-search-bar mb-10">
        <form id="searchForm" class="w-auto flex items-center border-2 px-1 rounded-md">   
            <div class="flex flex-1">
                <input 
                    type="text" 
                    name="search" 
                    id="search"
                    placeholder="Search name of course"
                    class="flex-1 px-4 py-2 focus:outline-2"
                >
                <button 
                    type="submit" 
                    class="bg-textColorLight text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Search
                </button>  
            </div>
        </form>
    </div>

    <!-- Current Courses -->
    <section class="mb-10">
    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.005] origin-center hidden"
                id="course-template">
                <img src="" class="w-full h-48 object-cover card-img-top" alt="Course Image">
                <div class="px-4 py-3 bg-gradient-to-r from-textColorLight to-titleColorLight flex flex-col justify-between">
                    <div class="content flex justify-between items-start">
                        <div class="course-content">
                            <h1 class="font-semibold text-lg mb-3 text-white card-title">Course Title</h1>
                            <p class="text-white mb-3 text-sm card-level">Level</p>
                        </div>
                        <div class="buttonCta">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Active</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm text-white mb-1">
                            <span>Progress</span>
                            <span class="progress-percent">0%</span>
                        </div>
                        <div class="w-full bg-white rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="mt-4 flex justify-stretch">
                            <a href="#" class="text-sm text-white hover:underline learn-link">Continue Learning</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Courses Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5" id="course-container">
            <!-- Course Card Template (hidden by default) -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.005] origin-center"
                id="course-template">
                <img src="" class="w-full h-48 object-cover card-img-top" alt="Course Image">
                <div class="px-4 py-3 bg-gradient-to-r from-textColorLight to-titleColorLight flex flex-col justify-between">
                    <div class="content flex justify-between items-start">
                        <div class="course-content">
                            <h1 class="font-semibold text-lg mb-3 text-white card-title">Course Title</h1>
                            <p class="text-white mb-3 text-sm card-level">Level</p>
                        </div>
                        <div class="buttonCta">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Active</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-sm text-white mb-1">
                            <span>Progress</span>
                            <span class="progress-percent">0%</span>
                        </div>
                        <div class="w-full bg-white rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 0%"></div>
                        </div>
                        <div class="mt-4 flex justify-stretch">
                            <a href="#" class="text-sm text-white hover:underline learn-link">Continue Learning</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const studentId = window.location.pathname.split('/')[2];
    const API_ENROLLED_COURSE = `http://localhost:3000/api/studentEnrolls`;
    const API_SEARCH_COURSE = `http://localhost:3000/api/searchCourse`;
    const BASE_URL = 'http://localhost:8000/backend-uploads/';

    document.addEventListener('DOMContentLoaded', function() {
        // Load courses on initial page load
        fetchEnrolledCourses();
        
        // Setup form submission handler
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            const courseContainer = document.getElementById('course-container');
            const courseTemplate = document.getElementById('course-template');
            e.preventDefault();
            const searchValue = document.getElementById('search').value.trim();
            console.log(searchValue)
            if (searchValue != "") {
                searchCourses(searchValue);
            } else {
                fetchEnrolledCourses();
            }
        });
    });

    async function fetchEnrolledCourses() {
        try {
            const response = await fetch(`${API_ENROLLED_COURSE}/${studentId}`);
            if (!response.ok) throw new Error('Network response was not ok');
            
            const data = await response.json();
            renderCourses(data); // Show first 3 courses
            console.log(data);

        } catch (error) {
            showErrorMessage();
            
        }
    }

    async function searchCourses(searchValue) {
        console.log(searchValue)
        try {
            const response = await fetch(`${API_SEARCH_COURSE}/${studentId}/${searchValue}`);
            
            const data = await response.json();
            renderCourses(data);
           
        } catch (error) {
            showErrorMessage();
            
        }
        document.getElementById('search').value = '';
       
    }

    // In the renderCourses function, modify the click handlers:

    function renderCourses(courses) {
    const courseContainer = document.getElementById('course-container');
    const courseTemplate = document.getElementById('course-template');
    const savedTemplate = courseTemplate.cloneNode(true);
    courseContainer.innerHTML = '';

    courses.forEach(course => {
        const courseCard = savedTemplate.cloneNode(true);
        courseCard.classList.remove('hidden');
        courseCard.style.display = 'block';
        courseCard.removeAttribute('id');
        courseCard.setAttribute('data-id', course.CourseID); // Use CourseID instead of id

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

        // Set progress
        const progress = course.Progress || 0;
        progressBar.style.width = `${progress}%`;
        progressPercent.textContent = `${progress}%`;
        
        // Card click handler
        courseCard.addEventListener('click', (e) => {
            if (e.target !== learnLink && !learnLink.contains(e.target)) {
                window.location.href = `/students/${course.id}/courses/${course.CourseID}`; // Use CourseID
            }
        });
        
        // Continue Learning button handler
         // Modified learnLink handler
         learnLink.onclick = (e) => {
                    e.preventDefault();
                    window.location.href = `/students/${course.id}/courses/${course.CourseID}`;
                };
                
        
        courseContainer.appendChild(courseCard);
    });
}
    // DI BAWAH INI MERUPAKAN CODE SEBELUM MERGE OLEH ALAND
    // function renderCourses(courses) {
    //     const courseContainer = document.getElementById('course-container');
    //     const courseTemplate = document.getElementById('course-template');
    //     const savedTemplate = courseTemplate.cloneNode(true); // simpan salinan
    //     courseContainer.innerHTML = ''; // ini akan hapus template aslinya

    //         courses.forEach(course => {
                
    //             const courseCard = savedTemplate.cloneNode(true);
    //             courseCard.classList.remove('hidden');
    //             courseCard.style.display = 'block';
    //             courseCard.removeAttribute('id');
    //             courseCard.setAttribute('data-id', course.id);

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
    //                 window.location.href = `/user/${studentId}/courses/${course.id}`;
    //             });
    //             learnLink.href = `/user/${studentId}/courses/${course.id}`;
    //             courseContainer.appendChild(courseCard);
    //         });
    //         // Update the UI with the fetched data

      
    // }

    function showErrorMessage() {
        const courseContainer = document.getElementById('course-container');
        courseContainer.innerHTML = `
            <div class="col-span-3 text-center py-8 text-red-500">
                <h1 class="text-2xl font-bold">No courses found</h1>
                <p class="mt-4">Please try again later.</p>
            </div>
        `;
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\WebStudyIT\resources\views/user/mycourse.blade.php ENDPATH**/ ?>
@extends('layouts.user')
@section('title', 'StudyIT')

@section('content')
<div class="w-full flex flex-col">
    <div
        class="header w-full bg-gradient-to-r from-textColorLight to-activeLight h-auto -mt-11 gap-4 px-10 py-8 flex flex-row text-white justify-between">
        <!-- Left content (your existing content) -->
        <div class="content-body flex flex-col gap-4 justify-center">
            <h1 class="course-name font-bold text-2xl" id="course-name">Understanding UI/UX Deeply</h1>
            <div class="stats flex flex-row items-center gap-4">
                <div class="attend flex flex-row items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <p class="text-xs">130,200</p>
                    <p class="text-xs">Attended this course</p>
                </div>
                <div class="enroll flex flex-row items-center gap-2 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <p class="text-xs">8</p>
                    <p class="text-xs">Registered in this course</p>

                </div>
            </div>
            <p class="course-description text-gray-400 text-sm w-1/2">Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Soluta pariatur porro tempore cupiditate cumque quas veniam commodi quo
                exercitationem!</p>
            <p class="text-sm text-sideBarLight">Course will end on <span class="end-date text-blue-600">30 Dec,
                    2025</span></p>
            <div class="rating flex flex-row gap-2 items-center ">
                <p class="text-sm">Ratings: </p>
                <div class="flex flex-row gap-2 ">
                    <svg class="w-4 h-4 text-gray-300 cursor-pointer star" data-rating="1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-300 cursor-pointer star" data-rating="1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-300 cursor-pointer star" data-rating="1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-300 cursor-pointer star" data-rating="1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg class="w-4 h-4 text-gray-300 cursor-pointer star" data-rating="1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                </div>
            </div>
        </div>
        <div class="flex w-auto z-20 pt-20 -mb-40 ">
            <img src="" class="image-container h-48   rounded-lg object-center shadow-lg">
        </div>

        <!-- Right container with image -->
    </div>
    <div class="modul w-4/6 h-40 py-6 pl-10 pr-4">
        <h1 class="text-xl font-bold">Course Modul</h1>

    </div>

</div>
<script>
    const studentId = window.location.pathname.split('/')[2];
    const courseId = window.location.pathname.split('/')[4];
    const API_ENROLLED_COURSE = `http://localhost:3000/api/studentEnrolls`;
    const API_SEARCH_COURSE = `http://localhost:3000/api/courses/`;
    const BASE_URL = 'http://localhost:8000/backend-uploads/';
    const API_RATING = `http://localhost:3000/api/coursesRating/`;

    document.addEventListener('DOMContentLoaded', function () {

        fetchCourses(courseId);
        fetchRating(courseId);

        // Setup form submission handler

    });

    async function fetchCourses(id) {
        try {

            const response = await fetch(`${API_SEARCH_COURSE}${courseId}`);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            console.log(data);
            const header = document.querySelector('.header');

            const courseName = document.querySelector('.course-name');
            const courseDescription = document.querySelector('.course-description');
            const courseImage = document.querySelector('.image-container');
            const endDate = document.querySelector('.end-date');
            if (!header) {
                console.error('Course name element not found');
                return;
            }

            courseName.textContent = data.course_name;
            courseDescription.textContent = data.description;
            courseImage.src = `${BASE_URL}${data.image}`;
            endDate.textContent = new Date(data.end_date).toLocaleDateString('en-Us', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

        } catch (error) {
            console.error('Error fetching course data:', error);

        }
    }
    async function fetchRating(id) {
        try {
            const response = await fetch(`${API_RATING}${courseId}`);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            console.log(data[0]);
            const ratingStars = document.querySelectorAll('.star');
            const ratingValue = data[0].average_rating;
            console.log(ratingValue)
            ratingStars.forEach(star => {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            });
            for (let i = 0; i < ratingValue; i++) {
                ratingStars[i].classList.remove('text-gray-300');
                ratingStars[i].classList.add('text-yellow-400');
            }
        } catch (error) {
            console.error('Error fetching course data:', error);

        }
        
    }
    // async function searchCourses(searchValue) {
    //     console.log(searchValue)
    //     try {
    //         const response = await fetch(`${API_SEARCH_COURSE}/${studentId}/${searchValue}`);

    //         const data = await response.json();
    //         renderCourses(data);

    //     } catch (error) {
    //         showErrorMessage();

    //     }
    //     document.getElementById('search').value = '';

    // }

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

    // function showErrorMessage() {
    //     const courseContainer = document.getElementById('course-container');
    //     courseContainer.innerHTML = `
    //         <div class="col-span-3 text-center py-8 text-red-500">
    //             <h1 class="text-2xl font-bold">No courses found</h1>
    //             <p class="mt-4">Please try again later.</p>
    //         </div>
    //     `;
    // }

</script>

@endsection

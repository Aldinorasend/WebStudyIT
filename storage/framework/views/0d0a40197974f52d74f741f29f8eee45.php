<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content-title', 'Course Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-center mb-6">Add New Course</h1>
    <button onclick="backtoList()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</button>
    
    <form id="create-course-form" class="mt-4 bg-white shadow-md rounded-lg p-6" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="course_name" class="block text-gray-700 font-medium mb-2">Course Name</label>
            <input type="text" id="course_name" name="course_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="instructor_id" class="block text-gray-700 font-medium mb-2">Instructor</label>
            <select id="instructor_id" name="instructor_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled selected>Select an Instructor</option>
                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->firstname); ?> <?php echo e($instructor->lastname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="level" class="block text-gray-700 font-medium mb-2">Level</label>
            <select id="level" name="level" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
            <input type="date" id="end_date" name="end_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" id="image" name="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
            <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add Course</button>
    </form>
</div>



<script>
    
    const apiCoursesUrl = 'http://localhost:3000/api/courses';
    const apiInstructorsUrl = 'http://localhost:3000/api/instructors';

    // Fungsi untuk memuat instruktur ke dalam dropdown
    const akunId = window.location.pathname.split('/')[2];
    console.log("akunId :",akunId)
  
    // async function loadInstructors() {
    //     try {
    //         const response = await fetch(apiInstructorsUrl);
    //         const instructors = await response.json();
    //         console.log(instructors)
    //         const instructorDropdown = document.getElementById('instructor_id');
    //         instructorDropdown.innerHTML = '';

    //         // Menambahkan instruktur ke dalam dropdown
    //         instructors.data.forEach(instructor => {
    //             const option = document.createElement('option');
    //             option.value = instructor.id;
    //             option.textContent = `${instructor.firstname} ${instructor.lastname}`;
    //             instructorDropdown.appendChild(option);
    //         });
    //     } catch (error) {
    //         console.error('Error loading instructors:', error);
    //     }
    // }

    // Panggil fungsi untuk memuat instruktur saat halaman dimuat
    // document.addEventListener('DOMContentLoaded', loadInstructors);
    

    // Event listener untuk menangani submit form

    async function backtoList(){
            window.location.href=`/admin/${akunId}/subjects`;
        }
    document.getElementById('create-course-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Mengambil data form
        const course_name = document.getElementById('course_name').value;
        const description = document.getElementById('description').value;
        const level = document.getElementById('level').value;
        const start_date = document.getElementById('start_date').value;
        const end_date = document.getElementById('end_date').value;
        const status = document.getElementById('status').value;
        const instructor_id = document.getElementById('instructor_id').value;
        const image = document.getElementById('image').files[0]; // Mengambil file yang diupload

        // Membuat objek FormData
        const formData = new FormData();
        formData.append("course_name", course_name);
        formData.append("description", description);
        formData.append("level", level);
        formData.append("start_date", start_date);
        formData.append("end_date", end_date);
        formData.append("status", status);
        formData.append("instructor_id", instructor_id);
        formData.append("image", image); // Menambahkan file image ke FormData

        try {
            // Mengirim data form ke API
            const response = await fetch(apiCoursesUrl, {
                method: 'POST',
                body: formData, // Mengirim FormData
            });

            // Mengecek apakah permintaan berhasil
            if (response.ok) {
                alert('Course added successfully');
                window.location.href = `/admin/${akunId}/subjects`; // Arahkan kembali ke halaman daftar course
            } else {
                const error = await response.json();
                alert('Error adding course: ' + error.message);
            }
        } catch (error) {
            console.error('Error adding course:', error);
            alert('Error adding course: ' + error.message);
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/admin/course/create.blade.php ENDPATH**/ ?>
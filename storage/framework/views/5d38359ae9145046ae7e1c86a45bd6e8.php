<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content-title', 'Subject Course Management'); ?>
<?php $__env->startSection('content'); ?>

<button class="bg-green-600 text-white w-fit px-4 py-2 rounded-lg mt-4 font-semibold text-sm flex items-center hover:bg-green-700 transition duration-200">
    <a href="subjects/create" class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Data
    </a>
</button>

<div class="container py-3">
    <table class="w-full border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3 text-sm font-semibold text-center">No</th>
                <th class="p-3 text-sm font-semibold text-center">Cover</th>
                <th class="p-3 text-sm font-semibold text-center">Course Name</th>
                <th class="p-3 text-sm font-semibold text-center">Instructor</th>
                <th class="p-3 text-sm font-semibold text-center">Level</th>
                <th class="p-3 text-sm font-semibold text-center">Start Date</th>
                <th class="p-3 text-sm font-semibold text-center">End Date</th>
                <th class="p-3 text-sm font-semibold text-center">Status</th>
                <th class="p-3 text-sm font-semibold text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <tr>
                <td colspan="9" class="text-center text-gray-500 p-4">Loading...</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    const apiUrl = 'http://localhost:3000/api/coursesAdmin';
    const baseUrl = 'http://localhost:8000/backend-uploads/';

    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();

            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Hapus isi sebelumnya

            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No courses found.</td></tr>`;
                return;
            }

            data.forEach((course, index) => {
                tableBody.insertAdjacentHTML('beforeend', `
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="p-3 text-center">${index + 1}</td>
                        <td class="p-3 text-center">
                            <img src="${baseUrl}${course.image}" alt="${course.course_name}" class="rounded-md shadow-md" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td class="p-3 text-center">${course.course_name}</td>
                        <td class="p-3 text-center">${course.firstname} ${course.lastname}</td>
                        <td class="p-3 text-center">${course.level.charAt(0).toUpperCase() + course.level.slice(1)}</td>
                        <td class="p-3 text-center">${new Date(course.start_date).toLocaleDateString()}</td>
                        <td class="p-3 text-center">${new Date(course.end_date).toLocaleDateString()}</td>
                        <td class="p-3 text-center">
                            <span class="${course.status === 'active' ? 'text-green-600 font-semibold' : 'text-red-500 font-semibold'}">
                                ${course.status.charAt(0).toUpperCase() + course.status.slice(1)}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex justify-center items-center gap-2">
                                <a href="/admin/subjects/${course.id}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm hover:bg-yellow-600 transition">Edit</a>
                                <button class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition" onclick="deleteCourse(${course.id})">Delete</button>
                            </div>
                        </td>

                    </tr>
                `);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            document.getElementById('table-body').innerHTML = `<tr><td colspan="9" class="text-center text-red-500 p-4">Error loading data.</td></tr>`;
        }
    }

    async function deleteCourse(id) {
        Swal.fire({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            icon:"warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then(async(result) => {
            if(result.isConfirmed){
                try{
                
                const response = await fetch(`${apiUrl}/${id}`, { method: 'DELETE' });
                if (!response.ok) throw new Error('Failed to delete course');
    
                alert('Course deleted successfully');
                fetchData(); // Refresh data
            } catch (error) {
                console.error('Error deleting course:', error);
                alert('Failed to delete course');
            }
        
            }
        
    });
}

    // Load data saat halaman dimuat
    document.addEventListener('DOMContentLoaded', fetchData);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/course/index.blade.php ENDPATH**/ ?>
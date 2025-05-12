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
    const urlPage = window.location.href;
    const akunId = urlPage.split('/').slice(-2, -1)[0];
    console.log("akunId:",akunId)
    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            console.log(data);
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
                        <td class="p-3 text-center justify-center content-center">
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
                            <div class="flex justify-center items-center gap-1">
                             <a href="/admin/${akunId}/moduls/${course.id}" class="bg-blue-500 text-white px-2 py-2 rounded-md text-sm hover:bg-yellow-600 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
</svg>
</a>
                                <a href="/admin/${akunId}/subjects/${course.id}/edit" class="bg-yellow-500 text-white px-2 py-2 rounded-md text-sm hover:bg-yellow-600 transition"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
</a>
                                <button class="bg-red-500 text-white px-2 py-2 rounded-md text-sm hover:bg-red-600 transition" onclick="deleteCourse(${course.id})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</button>
                               
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
                
                const response = await fetch(`${apiUrl}/${id}`, { method: 'PUT' });
                if (!response.ok) throw new Error('Failed to delete course');
    
                Swal.fire("Deactivated!", "Course has been deactivated succesfully", "success");
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/admin/course/index.blade.php ENDPATH**/ ?>
@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Modul Management')
@section('content')

<button class="bg-green-600 text-white w-fit px-4 py-2 rounded-lg mt-4 font-semibold text-sm flex items-center hover:bg-green-700 transition duration-200">
    <a href="moduls/create" class="flex items-center">
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
                <th class="p-3 text-sm font-semibold text-center">Course Name</th>
                <th class="p-3 text-sm font-semibold text-center">Title</th>
                <th class="p-3 text-sm font-semibold text-center">Description</th>
                <th class="p-3 text-sm font-semibold text-center">Assetto</th>
                <th class="p-3 text-sm font-semibold text-center">Yt Link</th>
                <th class="p-3 text-sm font-semibold text-center">Task</th>
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
    const apiUrl = 'http://localhost:3000/api/moduls';
    const urlPage = window.location.href;
    const akunId = window.location.pathname.split('/')[2];
    console.log("akunId:",akunId)
    const courseId = window.location.pathname.split('/')[4];
    console.log("courseId:",courseId)
    // const apiUrl = `http://localhost:3000/api/modulsByCourseID/${courseId}`;
    const baseUrl = 'http://localhost:8000/backend-uploads/';
    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            console.log(data);
            
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Hapus isi sebelumnya

            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Modul found.</td></tr>`;
                return;
            }

            data.forEach((modul, index) => {
                tableBody.insertAdjacentHTML('beforeend', `
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="p-3 text-center">${index + 1}</td>
                        <td class="p-3 text-center">${modul.course_name}</td>
                        <td class="p-3 text-center">${modul.Title}</td>
                        <td class="p-3 text-center">${modul.Description}</td>
                        <td class="p-3 text-center">
                        <img src="${baseUrl}${modul.Assetto}" alt="Cover"  class="rounded-md shadow-md" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td class="p-3 text-center">${modul.YTEmbedLink}</td>
                        <td class="p-3 text-center">${modul.Task}</td>

                        <td class="p-3 text-center">
                            <div class="flex justify-center items-center gap-2">
                                <a href="/admin/${akunId}/moduls/${modul.id}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm hover:bg-yellow-600 transition">Edit</a>
                                <button class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition" onclick="deleteCourse(${modul.id})">Delete</button>
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

@endsection

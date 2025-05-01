@extends('layouts.admin')
@section('title', 'Message Page')
@section('content-title', 'Students Management Page')
@section('content')

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
                <th class="p-3 text-sm font-semibold text-center">Name</th>
                <th class="p-3 text-sm font-semibold text-center">Email</th>
                <th class="p-3 text-sm font-semibold text-center">Phone Number</th>
                <th class="p-3 text-sm font-semibold text-center">Message</th>
                <th class="p-3 text-sm font-semibold text-center">Action</th>
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
    const apiUrl = 'http://localhost:3000/api/contact_us';

    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();

            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Hapus isi sebelumnya

            if (data.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Message found.</td></tr>`;
                return;
            }
            console.log(data);
            data.forEach((message, index) => {
                tableBody.insertAdjacentHTML('beforeend', `
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="p-3 text-center">${index + 1}</td>
                        <td class="p-3 text-center">${message.First_name} ${message.Last_name}</td>
                        <td class="p-3 text-center">${message.Email}</td>
                        <td class="p-3 text-center">${message.Phone_number}</td>
                        <td class="p-3 text-center">${message.Message}</td>
                      

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
                if (!response.ok) throw new Error('Failed to delete message');
    
                alert('message deleted successfully');
                fetchData(); // Refresh data
            } catch (error) {
                console.error('Error deleting message:', error);
                alert('Failed to delete message');
            }
        
            }
        
    });
}

    // Load data saat halaman dimuat
    document.addEventListener('DOMContentLoaded', fetchData);
</script>

@endsection

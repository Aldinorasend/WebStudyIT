@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Instructor Management')
@section('content')
  <button class="bg-green-600 text-white w-fit px-2 py-3 rounded-lg mt-4 font-semibold text-sm flex items-center">
    <a href="instructors/create" class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
      </svg>
      Tambah Data 
        </a>
      </button>
    <div class="container py-3">
        <table class="w-full border-gray-300 rounded-lg shadow-md">
      <thead class="bg-textColorLight border-b-2 border-white">
        <tr class="">
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">No.</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Email</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Phone</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Created-At</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Updated-At</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Actions</th>
        </tr>
      </thead>
      <tbody id="table-body">       
      </tbody>
      
    </table>
    <div class="flex justify-center items-center gap-4 mt-6" id="pagination">
      <button id="prevBtn" class="px-4 py-2 bg-gray-400 text-white rounded disabled:opacity-50">Previous</button>
      <span id="pageInfo" class="font-semibold"></span>
      <button id="nextBtn" class="px-4 py-2 bg-gray-400 text-white rounded disabled:opacity-50">Next</button>
    </div>
  </div>
</div>

<script>
  const apiUrl = 'http://localhost:3000/api/instructors';
  let currentPage = 1;
  let totalPages = 1;

  function timeAgo(date){
    return moment(date).fromNow();
  }
  function timeDate(date){
    return moment(date).format("Do MMMM YYYY")
  }

  async function fetchData(page = 1) {
    try {
        const response = await fetch(`${apiUrl}?page=${page}`);
        if (!response.ok) throw new Error('Network response was not ok');
        const responseData = await response.json();
        const data = responseData.data;
        const meta = responseData.meta;
        const limit = meta.limit;
        totalPages = meta.totalPages;
        currentPage = meta.page;

        const tableBody = document.getElementById('table-body');
        const akunId = window.location.pathname.split('/')[2];

        tableBody.innerHTML = '';
       
        if (data.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Instructors found.</td></tr>`;
            return;
        }
        
        data.forEach((instructor, index) => {
            const rowClass = index % 2 === 0 ? 'bg-gray-100 hover:bg-blue-50' : 'bg-white hover:bg-blue-50';
            tableBody.insertAdjacentHTML('beforeend', `
                <tr class="border-b ${rowClass} transition">
                    <td class="py-5 px-6 text-center text-gray-700">${(currentPage - 1) * limit + index + 1}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${instructor.firstname} ${instructor.lastname}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${instructor.email}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${instructor.phone_number}</td>
                    <td class="py-3 px-3 text-center text-gray-700">${timeDate(instructor.created_at)}</td>
                    <td class="py-3 px-3 text-center text-gray-700">${timeAgo(instructor.updated_at)}</td>
                    <td class="py-5 px-6 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <a href="/admin/${akunId}/instructors/${instructor.id}/edit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2" onClick="deleteData(${instructor.id})">Delete</button>
                        </div>
                    </td>
                </tr>
            `);
        });

        // Update pagination info
        document.getElementById('pageInfo').textContent = `Page ${currentPage} of ${totalPages}`;
        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = currentPage === totalPages;

    } catch (error) {
      console.error('Error fetching data:', error);
      document.getElementById('table-body').innerHTML = `<tr><td colspan="7" class="text-center text-red-500 p-4">Error loading data.</td></tr>`;
    }
  }

  // Tombol Pagination
  document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) {
      fetchData(currentPage - 1);
    }
  });

  document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentPage < totalPages) {
      fetchData(currentPage + 1);
    }
  });

  fetchData(); // Initial Load

  


  function deleteData(id){
    Swal.fire({
      title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then(async(result)=>{
      if(result.isConfirmed){
        try{
          const response = await fetch(`${apiUrl}/deactivate/${id}`, { method: 'PUT' });
                if (!response.ok) throw new Error("Failed to deactivate the instructor");
                Swal.fire("Deleted!", "Instuctor has been deactivated succesfully", "success");
                fetchData(); // 
        }catch(error){
          console.error("Error deleting course:", error);
          Swal.fire("Error!", "Failed to deactivate the instructor", "error");
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', fetchData);
</script>
@endsection
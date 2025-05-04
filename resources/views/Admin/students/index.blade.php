@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Students Management')
@section('content')

    <div class="container py-3">
        <table class="w-full border-gray-300 rounded-lg shadow-md">
      <thead class="bg-textColorLight border-b-2 border-white">
        <tr class="">
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">No.</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Students Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Email Address</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Phone Number</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">User Type</th>
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
    const apiUrl = 'http://localhost:3000/api/StudentAccounts';
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
        const data = await response.json();
        // const data = responseData.data;
        // const meta = responseData.meta;
        // const limit = meta.limit;
        // totalPages = meta.totalPages;
        // currentPage = meta.page;
        console.log(data);
        const tableBody = document.getElementById('table-body');
        const akunId = window.location.pathname.split('/')[2];

        tableBody.innerHTML = '';
       
        if (data.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Instructors found.</td></tr>`;
            return;
        }
        
        data.forEach((student, index) => {
            const rowClass = index % 2 === 0 ? 'bg-gray-100 hover:bg-blue-50' : 'bg-white hover:bg-blue-50';
            tableBody.insertAdjacentHTML('beforeend', `
                <tr class="border-b ${rowClass} transition">
                    <td class="py-5 px-6 text-center text-gray-700">${index+1}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${student.firstname} ${student.lastname}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${student.email}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${student.phonenumber}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${student.User_Type}</td>
                    <td class="py-5 px-6 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <a href="/admin/${akunId}/students/${student.id}/activity" class="bg-blue-500 text-white px-2 py-2 rounded hover:bg-blue-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
</svg>
</a>
                            <button class="bg-red-500 text-white px-2 py-2 rounded hover:bg-red-600 ml-2" onClick="deleteData(${student.id})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</button>
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
</script>
@endsection
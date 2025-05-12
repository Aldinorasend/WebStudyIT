@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Courses Taken')
@section('content')

<button onclick="backtoList()" class="bg-gray-500 text-white   px-4 mt-4 py-2 rounded-md hover:bg-gray-600">Back to Student List</button>
    <div class="container py-3">
    
        <table class="w-full border-gray-300 rounded-lg shadow-md">
        <thead class="bg-textColorLight border-b-2 border-white">
        <tr class="">
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">No.</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Course Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Instructor Name</th>          
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Progress</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Students Name</th>
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
    const urlPage = window.location.href;
    const akunId = window.location.pathname.split('/')[2];
    console.log("akunId:",akunId)
    const studentId = window.location.pathname.split('/')[4];
    console.log("studentId:",studentId)
    const apiUrl = `http://localhost:3000/api/studentsEnrolls/${studentId}`;
    let currentPage = 1;
    let totalPages = 1;

  function timeAgo(date){
    return moment(date).fromNow();
  }
  function timeDate(date){
    return moment(date).format("Do MMMM YYYY")
  }
  async function backtoList(){
    window.location.href = `/admin/${akunId}/students`;
    
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
        async function backtoList(){
           window.location.href=`/admin/${akunId}/instructors`;
    }
        tableBody.innerHTML = '';
       
        if (data.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Instructors found.</td></tr>`;
            return;
        }
        
        data.forEach((enrolls, index) => {
            const rowClass = index % 2 === 0 ? 'bg-gray-100 hover:bg-blue-50' : 'bg-white hover:bg-blue-50';
            tableBody.insertAdjacentHTML('beforeend', `
                <tr class="border-b ${rowClass} transition">
                    <td class="py-5 px-6 text-center text-gray-700">${index+1}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${enrolls.Courses_Name}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${enrolls.Instructors_FirstName} ${enrolls.Instructors_LastName} </td>
                    <td class="py-5 px-6 text-center text-gray-700">${enrolls.Progress}%</td>
                    <td class="py-5 px-6 text-center text-gray-700">${enrolls.Students_FirstName} ${enrolls.Students_LastName}</td>
                    <td class="py-5 px-6 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <a href="/admin/${akunId}/students/${studentId}/courses/${enrolls.CourseID}/tasks" class="bg-blue-500 text-white px-2 py-2 rounded hover:bg-blue-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>


</a>
                            <button 
  class="bg-green-500 text-white px-2 py-2 rounded hover:bg-green-600 ml-2 ${enrolls.Progress === 100 ? '' : 'opacity-50 cursor-not-allowed'}" 
  onClick="${enrolls.Progress === 100 ? `deleteData(${enrolls.id})` : 'return false;'}"
  ${enrolls.Progress === 100 ? '' : 'disabled'}
>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
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
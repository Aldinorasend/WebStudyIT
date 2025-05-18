@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Task Management')
@section('content')
<button onclick="backtoList()" class="bg-gray-500 text-white   px-4 mt-4 py-2 rounded-md hover:bg-gray-600">Back to Courses Taken</button>

    <div class="container py-3">
        <table class="w-full border-gray-300 rounded-lg shadow-md">
      <thead class="bg-textColorLight border-b-2 border-white">
        <tr class="">
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">No.</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Course Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Modul Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Student Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">File Submission</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Status</th>
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
    const courseId = window.location.pathname.split('/')[6];
    console.log("courseId:",courseId)
    const apiUrl = `http://localhost:3000/api/tasksUser/${studentId}/${courseId}`;
    console.log(apiUrl)
    let currentPage = 1;
    let totalPages = 1;
    function backtoList(){
           window.location.href=`/admin/${akunId}/students/${studentId}/activity`;
    }
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
        
        data.forEach((task, index) => {
            const rowClass = index % 2 === 0 ? 'bg-gray-100 hover:bg-blue-50' : 'bg-white hover:bg-blue-50';
            tableBody.insertAdjacentHTML('beforeend', `
                <tr class="border-b ${rowClass} transition">
                    <td class="py-5 px-6 text-center text-gray-700">${index+1}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${task.Courses_Name}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${task.Modul_Name}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${task.Students_FirstName} ${task.Students_LastName}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${task.FileTask}</td>
                    <td class="py-5 px-6 text-center text-gray-700">${task.Status}</td>

                    <td class="py-5 px-6 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <button onclick=ApproveTask(${task.id}) class="bg-green-500 text-white text-sm px-3 py-2 rounded hover:bg-green-600">Approve</a>
                            <button class="bg-red-500 text-white text-sm px-3 py-2 rounded hover:bg-red-600 ml-2" onClick="deleteData(${task.id})">Reject</button>
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
  function ApproveTask(taskId){
    const url = `http://localhost:3000/api/tasks/${taskId}/approve/`;
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        fetchData(currentPage);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
   
    backtoList();
  }

  async function updateProgressEnrollment(id){
    const url = `http://localhost:3000/api/updateProgress/${id}`;
    console.log(id)
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        fetchData(currentPage);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
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
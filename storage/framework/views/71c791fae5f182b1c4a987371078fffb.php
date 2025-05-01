<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content-title', 'Instructor Management'); ?>
<?php $__env->startSection('content'); ?>
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
  </div>
</div>

<script>
const apiUrl = 'http://localhost:3000/api/instructors';
  // LIbrary Untuk Penghitungan Waktu
  function timeAgo(date){
    return moment(date).fromNow();
  }
  function timeDate(date){
    return moment(date).format("Do MMMM YYYY")
  }

  async function fetchData() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error('Network response was not ok');
        const responseData = await response.json();
        const data = responseData.data;
        const tableBody = document.getElementById('table-body');

        tableBody.innerHTML = ''; // Hapus isi sebelumnya
       
          if (data.length === 0) {
              tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-gray-500 p-4">No Instructors found.</td></tr>`;
              return;
          }
          data.forEach((instructors, index) => {
              const rowClass = index % 2 === 0 ? 'bg-gray-100 hover:bg-blue-50' : 'bg-white hover:bg-blue-50';
              tableBody.insertAdjacentHTML('beforeend', `
                  <tr class="border-b ${rowClass} transition">
                      <td class="py-5 px-6 text-center text-gray-700">${index + 1}</td>
                      <td class="py-5 px-6 text-center text-gray-700">${instructors.firstname} ${instructors.lastname}</td>
                      <td class="py-5 px-6 text-center text-gray-700">${instructors.email}</td>
                      <td class="py-5 px-6 text-center text-gray-700">${instructors.phone_number}</td>
                      <td class="py-3 px-3 text-center text-gray-700">${timeDate(instructors.created_at)}</td>
                      <td class="py-3 px-3 text-center text-gray-700">${timeAgo(instructors.updated_at)}</td>
                  
                      <td class="py-5 px-6 text-center">
                          <div class="flex justify-center items-center gap-2">
                              <a href="/admin/subjects/${instructors.id}/edit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                              <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2" onClick="deleteData(${instructors.id})">Delete</button>
                          </div>
                      </td>
                  </tr>
              `);
          });
      } 
      catch(error){
        console.error('Error fetching data:', error);
        document.getElementById('table-body').innerHTML = `<tr><td colspan="7" class="text-center text-red-500 p-4">Error loading data.</td></tr>`;
      }
    }
  
        


  
  // fetch(apiUrl)
  // .then(response => {
  //   if(!response.ok){
  //     throw new Errror('Not Ok');
  //   }
  //   return response.json();
  // })
  // .then(responseData => {
  //   const data = responseData.data;
  //   console.log(data)
  //   const tableBody = document.getElementById('table-body');
  //   tableBody.innerHTML = '';
  //   data.forEach(instructors =>{
  //     const row = document.createElement('tr');
  //     if(instructors.id % 2 == 0){
  //       row.className = 'bg-gray-100 hover:bg-blue-50';
  //     }else{
  //       row.className = 'bg-white hover:bg-blue-50';
  //     }
  //     row.innerHTML = 
  //     `<td class="py-5 px-6 text-sm text-gray-700">${instructors.id}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">${instructors.firstname} ${instructors.lastname}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">${instructors.email}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">${instructors.phone_number}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">${timeDate(instructors.created_at)}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">${timeAgo(instructors.updated_at)}</td>
  //     <td class="py-5 px-6 text-sm text-gray-700">
  //       <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" >Edit</button>
  //       <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2" onClick="deleteData(${instructors.id})">Delete</button>`;

  //     tableBody.appendChild(row);
  //   })
  // })
  // .catch(error => console.log('Error:', error));


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
          const response = await fetch(`${apiUrl}/${id}`, { method: 'DELETE' });
                if (!response.ok) throw new Error("Failed to delete instructor");
                Swal.fire("Deleted!", "The Instuctor has been deleted.", "success");
                fetchData(); // 
        }catch(error){
          console.error("Error deleting course:", error);
          Swal.fire("Error!", "Failed to delete course.", "error");
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', fetchData);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/instructor/index.blade.php ENDPATH**/ ?>
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
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Course Name</th>
          <th class="p-3 text-sm font-semibold tracking-wide text-center text-white">Progress</th>
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
    
</script>
@endsection
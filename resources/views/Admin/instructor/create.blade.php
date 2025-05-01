@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content-title', 'Instructor Management')
@section('content')

<div class="container mx-auto p-6 ">
    <h1 class="text-2xl font-semibold text-center mb-6">Add New Instructor</h1>
    <button onclick="backtoList()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</button>
    
    <form id="create-instructor-form" class="mt-4 bg-white shadow-md rounded-lg p-6 w-full">
        <div class="mb-4">
            <label for="firstname" class="block text-gray-700 font-medium mb-2">First Name</label>
            <input type="text" id="firstname" name="firstname" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label for="lastname" class="block text-gray-700 font-medium mb-2">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label for="phone_number" class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add Instructor</button>
    </form>
</div>

<script>
     const akunId = window.location.pathname.split('/')[2];
     console.log("akunId :",akunId)
    async function backtoList(){
           window.location.href=`/admin/${akunId}/instructors`;
    }
    const apiUrl = 'http://localhost:3000/api/instructors';

    document.getElementById('create-instructor-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const firstname = document.getElementById('firstname').value;
        const lastname = document.getElementById('lastname').value;
        const email = document.getElementById('email').value;
        const phone_number = document.getElementById('phone_number').value;

        fetch(apiUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ firstname, lastname, email, phone_number })
        }).then(() => {
            alert('Instructor added successfully');
            window.location.href = `/admin/${akunId}/instructors` 
        });
    });
</script>

@endsection

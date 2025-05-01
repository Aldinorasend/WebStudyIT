@extends('layouts.admin')
@section('title', 'Admin Page')
@section('content')
    <h2 id="welcome-message" class="text-textColorLight font-bold text-3xl">Loading...</h2>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const pathSegments = window.location.pathname.split('/'); // Memisahkan URL berdasarkan '/'
        const idValue = parseInt(pathSegments[2], 10);             
        const apiUrlAdmin = `http://localhost:3000/api/Accounts/${idValue}`;
    
            fetch(apiUrlAdmin)
                .then(response => response.json())
                .then(data => {
                    const username = data.username;
                    document.getElementById("welcome-message").textContent = `Welcome Back, ${username}`;
                })
                .catch(error => console.error("Error fetching data:", error));
        });
    </script>
@endsection
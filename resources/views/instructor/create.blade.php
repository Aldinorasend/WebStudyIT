@extends ('layouts.admin')

@section('title', 'Instructor Data')

@section('content')

<div class="container mt-4">
        <h1 class="mb-4 text-center">Add New Instructor</h1>
        <a href="/instructors" class="btn btn-secondary mb-3">Back to List</a>
        <form id="create-instructor-form">
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <button type="submit" class="btn btn-success">Add Instructor</button>
        </form>
    </div>

    <script>
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
                body: JSON.stringify({ firstname, lastname, email,phone_number })
            }).then(() => {
                alert('Instructor added successfully');
                window.location.href = '/instructors';
            });
        });
    </script>
@endsection

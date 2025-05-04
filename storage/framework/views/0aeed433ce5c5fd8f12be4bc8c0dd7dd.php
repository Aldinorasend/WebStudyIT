<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instructor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Instructor</h1>
        <a onclick="backtoList()" class="btn btn-secondary mb-3">Back to List</a>
        <form id="edit-course-form">
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" id="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" required> 
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Instructor</button>
        </form>
    </div>
    <script>
        const apiUrl = 'http://localhost:3000/api/instructors';
        const insId = window.location.pathname.split('/')[4];
        const akunId = window.location.pathname.split('/')[2];
        console.log("instructorId:",insId)
        console.log("akun:",akunId)

        async function backtoList(){
            window.location.href=`/admin/${akunId}/instructors`;
        }

       


        // Fetch data course untuk diisi di form
        fetch(`${apiUrl}/${insId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('firstname').value = data.firstname;
                document.getElementById('lastname').value = data.lastname;
                document.getElementById('email').value = data.email;
                document.getElementById('phone_number').value = data.phone_number;
                document.getElementById('status').value = data.status;
            });

        // Update data course
        document.getElementById('edit-course-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const firstname = document.getElementById('firstname').value;
            const lastname = document.getElementById('lastname').value;
            const email = document.getElementById('email').value;
            const phone_number = document.getElementById('phone_number').value;
            const status = document.getElementById('status').value;
            

            fetch(`${apiUrl}/${insId}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ firstname, lastname, email, phone_number, status })
            }).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Instructor updated successfully',
                    showConfirmButton: false,
                    timer: 15000
                });
                console.log(akunId);
                window.location.href = `/admin/${akunId}/instructors/`;
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/admin/instructor/edit.blade.php ENDPATH**/ ?>
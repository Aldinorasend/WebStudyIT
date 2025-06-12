<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Instructor</title>
    @vite('resources/css/app.css')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Edit Instructor</h1>
        <button onclick="backtoList()" class="mb-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</button>
        
        <form id="edit-course-form" class="space-y-4">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname</label>
                <input type="text" id="firstname" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Lastname</label>
                <input type="text" id="lastname" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" id="phone_number" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>
           
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700">Update Instructor</button>
        </form>
    </div>

    <script>
        const apiUrl = 'http://localhost:3000/api/instructors';
        const insId = window.location.pathname.split('/')[4];
        const akunId = window.location.pathname.split('/')[2];
        console.log("instructorId:", insId)
        console.log("akun:", akunId)

        async function backtoList(){
            window.location.href = `/admin/${akunId}/instructors`;
        }

        async function fetchIns() {
            try {
                const response = await fetch(`${apiUrl}/${insId}`);
                if (!response.ok) throw new Error('Network response was not ok');
                const instructor = await response.json();
              
                return instructor;
            } catch (error) {
                console.error('Error fetching instructor data:', error);
            }
        }

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
                body: JSON.stringify({ firstname, lastname, email, phone_number })
            }).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Instructor updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.href = `/admin/${akunId}/instructors/`;
            });
        });

        window.addEventListener('DOMContentLoaded', async () => {
            const instructor = await fetchIns();
            if (instructor) {
                document.getElementById('firstname').value = instructor.firstname;
                document.getElementById('lastname').value = instructor.lastname;
                document.getElementById('email').value = instructor.email;
                document.getElementById('phone_number').value = instructor.phone_number;;
            }
        });
    </script>
</body>
</html>

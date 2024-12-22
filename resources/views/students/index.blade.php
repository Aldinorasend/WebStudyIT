<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }
        #sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        #sidebar a:hover {
            background-color: #495057;
        }
        #content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar">
        <h3 class="text-center">Admin Panel</h3>
        <a href="/dashboard">Dashboard</a>
        <a href="/instructors">Instructor List</a>
        <a href="/students">Student List</a>
        <a href="/courses">Course Management</a>
        <a href="/reports">Reports</a>
        <a href="/settings">Settings</a>
        <a href="/logout">Logout</a>
    </div>

    <!-- Content -->
    <div id="content">
        <div class="container mt-4">
            <h1 class="mb-4 text-center">Instructor List</h1>
            <a href="/items/create" class="btn btn-primary mb-3">Add New Instructor</a>
            <table class="table table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Instructor ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="items-table">
                    <!-- Data akan diisi melalui JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- <script>
        const apiUrl = 'http://localhost:3000/api/items';

        // Fetch data dari Express.js API
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Data fetched:', data); // Menambahkan log untuk melihat data yang diterima
                const table = document.getElementById('items-table');
                if (data.length === 0) {
                    table.innerHTML = `<tr><td colspan="6" class="text-center">No items found.</td></tr>`;
                } else {
                    data.forEach((item, index) => {
                        table.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.email}</td>
                                <td>${item.phone}</td>
                                <td>
                                    <a href="/items/${item.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="deleteItem(${item.id})">Delete</button>
                                </td>
                            </tr>`;
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error); // Menangani error jika ada
            });

        // Fungsi untuk menghapus item
        function deleteItem(id) {
            fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            }).then(() => {
                alert('Item deleted successfully');
                location.reload();
            });
        }
    </script> -->
</body>
</html>

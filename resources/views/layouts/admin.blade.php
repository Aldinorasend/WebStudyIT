<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction:row;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #002982;
            color: #fff;
            padding-top: 20px;
        }
        #sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition:0.5s
        }
        #sidebar a:hover {
            background-color: #018BFA;
            
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
        <h3 class="text-center fw-bold"> Admin Panel</h3>
        <a href="/admin/dashboard" class="mt-5">Dashboard</a>
        <a href="/instructors">Instructor List</a>
        <a href="/students">Student List</a>
        <a href="/courses">Course Management</a>
        <a href="/reports">Reports</a>
        <a href="/settings">Settings</a>
        <a href="/logout">Logout</a>
    </div>

    <!-- Content -->
    <div id="content">
        @yield('content')
    </div>

  
</body>
</html>

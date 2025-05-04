<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/editprofile.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=keyboard_arrow_down" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="nav-brand">
                    <img src="<?php echo e(asset('image/logo.png')); ?>" alt="Logo">
                    <h1>StudyIT</h1>
                </div>
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <div class="nav-menu">
                    <div class="nav-list">
                        <ul>
                            <li>
                                <span>
                                    <a href="javascript:history.back()">Home</a>
                                </span>
                            </li>
                            <li>
                                <a href="javascript:history.back()">Bootcamp</a>
                            </li>
                            <li>
                                <a href="contactus.html">Contact Us</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn"><?php echo e($students->username); ?><span class="material-symbols-outlined">
                                        keyboard_arrow_down
                                        </span></button>
                                    <div class="dropdown-content">
                                        <ul>
                                            <li>
                                                <a href="#">Edit Profile</a>
                                            </li>
                                            <li>
                                                <a href="/">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    <main>
        <section class="profile-section">
            <h2>Edit Profile</h2>
            <div class="profile-card">
                <div class="profile-image-wrapper">
                    <img id="profile-image" src="<?php echo e(asset('image/profile.png')); ?>" alt="Profile Picture">
                    <!-- Change Picture Section -->
                    <input type="file" id="profile-picture-upload" accept="image/*" onchange="previewImage(event)" style="display: none;">
                    <button onclick="document.getElementById('profile-picture-upload').click()">Change Picture</button>
                </div>
                <div class="profile-info">
                    <div>
                        <div>
                            <label for="edit-name"><strong>Username:</strong></label>
                            <input type="text" id="edit-name" name="name" readonly />
                        </div>
                        
                    </div>
                    <div>
                        <div>
                            <label for="edit-name"><strong>Email:</strong></label>
                            <input type="email" id="edit-email" name="name" readonly />
                        </div>
                        
                    </div>
                    <div>
                        <label for="edit-phone"><strong>Phone Number:</strong></label>
                        <input type="tel" id="edit-phone" name="phone" pattern="[0-9]{10}" title="Phone number should be a 10-digit number" required />
                    </div>
                    
                    <div>
                        <label for="edit-bio"><strong>Bio :</strong></label>
                        <input type="text" id="edit-bio" name="bio" required />
                    </div>
                    
                    <div>
                        <label for="edit-address"><strong>Birthdate:</strong></label>
                        <input type="date" id="edit-address" name="address" />
                    </div>
                    <button onclick="saveProfile()">Save Changes</button>
                </div>
            </div>
        </section>
    </main>
    
    

    <script src="<?php echo e(asset('js/editprofile.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/Editprofile/index.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course View</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylesCor.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="banner">
        <img id="banner-image" src="" alt="Banner Image">
        <div class="banner-text" id="course-title">Course Title</div>
    </div>

    <div class="arw-back">
        <a href="../page/homePage.html">
            <img src="<?php echo e(asset('image/backarrow.png')); ?>" alt="Back to Course View">
        </a>
    </div>

    <div class="bootcamp-container">
        <!-- <h1 class="bootcamp">Courses</h1> -->
        <div class="row">
            <div class="container" id="course-container">
                <div class="card" id="course-template" style="display: none;">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;"></h5>
                        <div class="date-container">
                            <img src="<?php echo e(asset('image/calen.png')); ?>" alt="Date Icon" class="calendar-icon">
                            <p class="date-card"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dec-container">
        <p>What You'll Learn:</p>
        <div id="json-items">
            <!-- Data will be inserted dynamically -->
        </div>
    </div>

    <div class="des-tools">
        <p>Here are some tools that you'll learn in this course</p>
        <div class="img-tools">
            <img src="../asset/image/figmaaa.png" alt="Figma Icon" class="img-icon">
            <img src="../asset/image/adobe1.jpg" alt="Adobe Icon" class="img-icon">
        </div>
    </div>

    <!-- YouTube Video Iframe -->
    <div class="des-container">
    <div class="vid-cor">
    <!-- YouTube iframe will be inserted dynamically here -->
</div>
    </div>

    <div class="enroll-container">
        <a href="../page/videoModule.html" class="btn btn-primary btn-lg">Enroll</a>
    </div>

    <script>
        const apiUrl = 'http://localhost:3000/api/modulsByCourseID/<?php echo e($courses->id); ?>'; // Replace with your API vidio
        const baseUrl = 'http://localhost:8000/backend-uploads/'; // Replace with your base vidio for assets

fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        console.log("Fetched Data:", data);

        // Update banner
        document.getElementById('banner-image').src = `${baseUrl}${data.vidio}`;
        document.getElementById('course-title').textContent = "Id Modul : " + data.id;
        document.getElementById('json-items').textContent = "ID Course : " + data.CourseID;

        // YouTube video setup
        const youtubeVideoUrl = `https://www.youtube.com/embed/tgbNymZ7vqY`;
        console.log("YouTube Video URL:", youtubeVideoUrl);

        const iframe = document.createElement('iframe');
        iframe.src = youtubeVideoUrl;
        iframe.width = "100%";
        iframe.height = "315";
        iframe.frameBorder = "0";
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;

        // Replace video container
        const videoContainer = document.querySelector('.vid-cor');
        videoContainer.innerHTML = ''; // Clear any existing content
        videoContainer.appendChild(iframe);
    })
    .catch(error => {
        console.error("Error fetching courses:", error);
    });


    </script>
</body>
</html>
<?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/modul/index.blade.php ENDPATH**/ ?>
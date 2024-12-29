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

    <script src="<?php echo e(asset('js/modulPage.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\alienware\Documents\WebPro\TUBESSS\WebStudyIT\resources\views/modul/index.blade.php ENDPATH**/ ?>
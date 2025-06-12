<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content-title', 'Modul Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-center mb-6">Add New Moduls</h1>
    <button onclick="backtoList()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</button>
    
    <form id="create-moduls-form" class="mt-4 bg-white shadow-md rounded-lg p-6" enctype="multipart/form-data">
        
        <div class="mb-4">
            <label for="CourseID" class="block text-gray-700 font-medium mb-2">Course</label>
            <select id="CourseID" name="CourseID" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled selected>Select a course</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($course->id); ?>"><?php echo e($course->course_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="modul" class="block text-gray-700 font-medium mb-2">Modul Title</label>
            <input type="text" id="Title" name="Title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Modul Description</label>
            <textarea id="Description" name="Description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>


        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" id="Assetto" name="Assetto" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">YT Link</label>
            <textarea id="YTEmbedLink" name="YTEmbedLink" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Task</label>
            <textarea id="Task" name="Task" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
       

        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add Modul to Course</button>
    </form>
</div>



<script>
    const apiModulUrl = 'http://localhost:3000/api/moduls'

    // Fungsi untuk memuat instruktur ke dalam dropdown
    const akunId = window.location.pathname.split('/')[2];
    console.log("akunId :",akunId)

    async function backtoList(){
            window.location.href=`/admin/${akunId}/moduls`;
        }
    document.getElementById('create-moduls-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Mengambil data form
        const CourseID = document.getElementById('CourseID').value;
        const Title = document.getElementById('Title').value;
        const Description = document.getElementById('Description').value;
        const Assetto = document.getElementById('Assetto').files[0]; // Perhatikan .files[0] untuk file upload
        const YTEmbedLink = document.getElementById('YTEmbedLink').value;
        const Task = document.getElementById('Task').value;
        if(!CourseID || !Title || !Description || !Assetto || !YTEmbedLink || !Task){
            console.log('Element not found');
        }

        // Membuat objek FormData
        const formData = new FormData();
        formData.append("CourseID", CourseID);
        formData.append("Title", Title);
        formData.append("Description", Description);
        formData.append("Assetto", Assetto);
        formData.append("YTEmbedLink", YTEmbedLink);
        formData.append("Task", Task);
        console.log('FormData contents:');
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        try {
            // Mengirim data form ke API
            const response = await fetch(apiModulUrl, {
                method: 'POST',
                body: formData, // Mengirim FormData
            });
            if (!response.ok) {
                const errorData = await response.text(); // Coba text() dulu untuk melihat response mentah
                console.error('Raw Error Response:', errorData);
                throw new Error('Server returned ' + response.status);
             }

            // Mengecek apakah permintaan berhasil
            const result = await response.json();
            console.log('Success:', result);
            alert('Modul created successfully!');
            window.location.href = `/admin/${akunId}/moduls`;
        } catch (error) {
            console.error('Error adding moduls to course:', error);
            alert('Error adding moduls to course: ' + error.message);
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\WebStudyIT\resources\views/admin/modul/create.blade.php ENDPATH**/ ?>
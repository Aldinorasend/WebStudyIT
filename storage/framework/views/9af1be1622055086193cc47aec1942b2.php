
<?php $__env->startSection('title', 'Admin Page'); ?>
<?php $__env->startSection('content-title', 'Modul Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold text-center mb-6">Add New Moduls</h1>
    <button onclick="backtoList()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to List</button>
    
    <form id="create-moduls-form" class="mt-4 bg-white shadow-md rounded-lg p-6" enctype="multipart/form-data">
        
        <div class="mb-4">
            <label for="CourseID" class="block text-gray-700 font-medium mb-2">Affiliate with Course</label>
            <select id="CourseID" name="CourseID" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >
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
            <input type="file" id="Assetto" name="Assetto" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-gray-700 text-sm font-medium mb-2">Currently uploaded : <span id="existing-file" class="text-sm text-gray-500 mt-2"></span></p>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">YT Link</label>
            <textarea id="YTEmbedLink" name="YTEmbedLink" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Task</label>
            <textarea id="Task" name="Task" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
       

        <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Edit Modul</button>
    </form>
</div>



<script>
    const akunId = window.location.pathname.split('/')[2];
    let modulId = window.location.pathname.split('/')[4];;
    if(window.location.pathname.includes('subjects')){
         modulId = window.location.pathname.split('/')[6];
    }
    console.log(modulId)
    const apiModulUrl = `http://localhost:3000/api/moduls/${modulId}`
    // Get Existing Value
    fetch (apiModulUrl)
        .then(response => response.json())
        .then(data => {
            console.log('Modul Data:', data);
            document.getElementById('CourseID').value = data.CourseID;
            document.getElementById('Title').value = data.Title;
            document.getElementById('Description').value = data.Description;
            document.getElementById('existing-file').textContent = data.Assetto; 
            document.getElementById('YTEmbedLink').value = data.YTEmbedLink;
            document.getElementById('Task').value = data.Task;
        })
        .catch(error => console.error('Error fetching modul data:', error));
    // Fungsi untuk memuat instruktur ke dalam dropdown
    console.log("akunId :",akunId)

        async function backtoList(){
                // trim the path to remove any trailing slashes
                window.location.href= window.location.pathname.replace(`/${modulId}/edit`, '');
            }
   document.getElementById('create-moduls-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const CourseID = document.getElementById('CourseID').value;
    const Title = document.getElementById('Title').value;
    const Description = document.getElementById('Description').value;
    const Assetto = document.getElementById('Assetto').files[0];
    const YTEmbedLink = document.getElementById('YTEmbedLink').value;
    const Task = document.getElementById('Task').value;

    if (!CourseID || !Title || !Description || !Assetto || !YTEmbedLink || !Task) {
        console.log('Some fields are missing');
        return;
    }

    const formData = new FormData();
    formData.append("CourseID", CourseID);
    formData.append("Title", Title);
    formData.append("Description", Description);
    formData.append("Assetto", Assetto); // ✅ Ini untuk file
    formData.append("YTEmbedLink", YTEmbedLink);
    formData.append("Task", Task);

    try {
        const response = await fetch(apiModulUrl, {
            method: 'PUT',
            body: formData, // ✅ FormData, tanpa headers manual
        });

        if (!response.ok) {
            const errText = await response.text();
            console.error("Raw error:", errText);
            throw new Error("Server returned " + response.status);
        }

        const result = await response.json();
        console.log('Success:', result);
        Swal.fire({
            icon: 'success',
            title: 'Modul updated successfully',
            showConfirmButton: false,
            timer: 1500
        });
        window.location.href = window.location.pathname.replace(`/${modulId}/edit`, '');
    } catch (error) {
        console.error('Error editing moduls:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error editing moduls',
            text: error.message,
            showConfirmButton: true
        });
    }
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\WebStudyIT\resources\views/Admin/modul/edit.blade.php ENDPATH**/ ?>
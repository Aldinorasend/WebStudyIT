<?php $__env->startSection('title', 'Course Module'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <!-- Course Banner -->
    <div class="relative rounded-xl overflow-hidden shadow-lg mb-8 h-64">
        <img id="banner-image" src="" alt="Course Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <h1 id="course-title" class="text-3xl font-bold text-white">Course Title</h1>
        </div>
        <a href="<?php echo e(url()->previous()); ?>" class="absolute top-4 left-4 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
    </div>

    <!-- Course Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- What You'll Learn -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">What You'll Learn</h2>
                <div id="json-items" class="space-y-2 text-gray-700">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>

            <!-- Video Section -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Lesson Video</h2>
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                    <div id="video-container" class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <p class="text-gray-500">Video will appear here</p>
                    </div>
                </div>
            </div>

            <!-- Tools Section -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Tools You'll Use</h2>
                <div class="flex flex-wrap gap-4" id="tools-container">
                    <!-- Tools will be loaded dynamically -->
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Tasks Section -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Your Tasks</h2>
                <div id="task-list" class="space-y-3">
                    <!-- Tasks will be loaded dynamically -->
                </div>
            </div>

            <!-- Submission Form -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Submit Your Work</h2>
                <form id="submit-task" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label for="FileTask" class="block text-sm font-medium text-gray-700 mb-1">Upload File</label>
                        <input type="file" id="FileTask" name="FileTask" required
                            class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100">
                    </div>
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        Submit Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const EnrollId = window.location.pathname.split('/')[2];
    const ModulId = window.location.pathname.split('/')[6];
    const apiUrl = `http://localhost:3000/api/moduls/${ModulId}`;
    const taskUploadUrl = 'http://localhost:3000/api/tasks/';
    const baseUrl = 'http://localhost:8000/backend-uploads/';
    
    async function taskChecker() {
            try {
                const response = await fetch(`http://localhost:3000/api/tasksCheck/${EnrollId}/${ModulId}`);
                if (response.ok) {
                    const data = await response.json();
                    console.log("Task Checker Data:", data);
                    console.log("Task Checker Data:", data);
                    if (data.length > 0) {
                        const taskList = document.getElementById('submit-task');
                        // Get the first task (assuming there might be multiple)
                        const task = data[0]; 
                        taskList.innerHTML = `
                            <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                                <p class="text-gray-800 font-medium">Task already submitted</p>
                                <p class="text-gray-600 mt-1">File: ${task.FileTask}</p>
                                <p class="text-gray-500 text-sm mt-1">Submitted on: ${new Date(task.SubmittedAt).toLocaleString(
                                    'en-US', {
                                            day: 'numeric',
                                            month: 'long',
                                            year: 'numeric'
                                    }
                                )}</p>
                                <p class="text-gray-500 text-sm">Status: ${task.Status || 'Completed'}</p>
                            </div>`;
                    }
                } else {
                    console.error("Error checking tasks:", response.statusText);
                }
            } catch (error) {
                console.error("Error fetching task checker data:", error);
            }
            
        }

    async function fetchModulData(){
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data:", data);

                // Update banner and title
                document.getElementById('banner-image').src = `${baseUrl}${data.Assetto}`;
                document.getElementById('course-title').textContent = data.Title;

                // Update learning points
                const jsonItems = document.getElementById('json-items');
                if (data.Description) {
                    const points = data.Description.split('. ').filter(point => point.trim() !== '');
                    jsonItems.innerHTML = points.map(point => 
                        `<div class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mt-0.5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <p>${point}</p>
                        </div>`
                    ).join('');
                }

                // Update video
                const videoContainer = document.getElementById('video-container');
                if (data.YTEmbedLink) {
                    const iframe = document.createElement('iframe');
                    iframe.src = `https://www.youtube.com/embed/${data.YTEmbedLink}`;
                    iframe.width = "100%";
                    iframe.height = "400";
                    iframe.frameBorder = "0";
                    iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
                    iframe.allowFullscreen = true;
                    iframe.className = "rounded-lg shadow-md";
                    videoContainer.innerHTML = '';
                    videoContainer.appendChild(iframe);
                }

                // Update tasks
                const taskList = document.getElementById('task-list');
                if (data.Task) {
                    taskList.innerHTML = `
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <p class="text-gray-800">${data.Task}</p>
                        </div>`;
                }

                // Update tools (if available)
                const toolsContainer = document.getElementById('tools-container');
                // This is a placeholder - you might want to fetch actual tools from your API
                toolsContainer.innerHTML = `
                    <div class="flex items-center bg-gray-100 px-4 py-2 rounded-lg">
                        <svg class="h-6 w-6 text-gray-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-700">Tools will be listed here</span>
                    </div>`;
            })
            .catch(error => {
                console.error("Error fetching courses:", error);
            });
    }
    document.addEventListener('DOMContentLoaded', function() {
        console.log(EnrollId, ModulId);
        taskChecker();
        fetchModulData();
        // Fetch module data
       

        // Handle file task submission
        document.getElementById('submit-task').addEventListener('submit', async function(e) {
            e.preventDefault();

            const fileInput = document.getElementById('FileTask');
            const file = fileInput.files[0];

            if (!file) {
                alert('Please select a file to upload.');
                return;
            }

            const url = window.location.pathname;
            const pathParts = url.split('/');
            const EnrollId = pathParts[2];
            const modul = pathParts[4];

            const formData = new FormData();
            formData.append('FileTask', file);
            formData.append('ModulID', parseInt(modul));
            formData.append('EnrollID', parseInt(EnrollId)); //BENAR

//             fetch('http://localhost:3000/api/tasks', {
//   method: 'POST',
//   body: formData
// })
// .then(res => res.json())
// .then(data => console.log(data))
// .catch(err => console.error(err));

            try {
                const response = await fetch(taskUploadUrl, {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    alert('Task submitted successfully!');
                    fileInput.value = '';
                } else {
                    const errorData = await response.json();
                    alert('Error submitting: ' + (errorData.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error submitting task:', error);
                alert('An error occurred while submitting the task. Please try again later.');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alienware\Documents\WebPro\DINO\WebStudyIT\resources\views/user/modul.blade.php ENDPATH**/ ?>
@extends('layouts.user')
@section('title', 'Course Module')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Course Banner -->
    <div class="relative rounded-xl overflow-hidden shadow-lg mb-8 h-64">
        <img id="banner-image" src="" alt="Course Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <h1 id="course-title" class="text-3xl font-bold text-white">Course Title</h1>
        </div>
        <a href="{{ url()->previous() }}" class="absolute top-4 left-4 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
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

            <!-- Download Button -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <a href="#" id="download-link" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download Module
                </a>
            </div>

            <!-- Tools Section -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Tools You'll Use</h2>
                <div class="flex flex-wrap gap-4" id="tools-container">
                    <!-- Tools will be loaded dynamically -->
                </div>
            </div>

            <!-- Discussion Forum -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Discussion Forum</h2>
                
                <!-- Discussion Form -->
                <form id="discussion-form" class="mb-6 space-y-4">
                    <div>
                        <label for="topics" class="block text-sm font-medium text-gray-700 mb-1">Topics</label>
                        <input type="text" id="topics" name="topics" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="discussions" class="block text-sm font-medium text-gray-700 mb-1">Discussions</label>
                        <textarea id="discussions" name="discussions" rows="3" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <input type="hidden" id="parent-id" name="parent_id" value="">
                    
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                        Post Discussion
                    </button>
                </form>

                <!-- Discussions List -->
                <div id="discussion-list" class="space-y-4">
                    <!-- Discussions will be loaded here -->
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
                    <!-- File Preview -->
                    <div id="file-preview" class="mt-2"></div>
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        Submit Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reply Modal -->
<div id="replyModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Reply to Discussion</h3>
        <form id="reply-form" class="space-y-4">
            <input type="hidden" id="reply-parent-id">
            <div>
                <label for="reply-topic" class="block text-sm font-medium text-gray-700 mb-1">Sub-Topic</label>
                <input type="text" id="reply-topic" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="reply-discussion" class="block text-sm font-medium text-gray-700 mb-1">Reply</label>
                <textarea id="reply-discussion" rows="3" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" id="close-reply-modal"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium rounded-md transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                    Post Reply
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const studentId = window.location.pathname.split('/')[2];
    const EnrollId = window.location.pathname.split('/')[4];
    const courseId = window.location.pathname.split('/')[6];
    const ModulId = window.location.pathname.split('/')[8];
    const apiUrl = `http://localhost:3000/api/moduls/${ModulId}`;
    const taskUploadUrl = 'http://localhost:3000/api/tasks/';
    const baseUrl = 'http://localhost:8000/backend-uploads/';
    const discussionApiUrl = 'http://localhost:3000/api/discussions/';
    const replyApiUrl = 'http://localhost:3000/api/discussion_replies/';
    console.log("EnrollId: ", EnrollId, " ModulId: ", ModulId, "StudentId: ", studentId);
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
        console.log("EnrollID: ",EnrollId, " ModulId: ",ModulId);
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
            const EnrollId = pathParts[4];
            const modul = pathParts[8];

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
                console.log("Response:", response);
                if (response.ok) {
                    alert('Task submitted successfully!');
                    fileInput.value = '';
                    window.location.href = `/students/${studentId}/enrolls/${EnrollId}/courses/${courseId}`;

                } 
            } catch (error) {
                console.error('Error submitting task:', error);
                alert('An error occurred while submitting the task. Please try again later.');
            }
        });
    });

    // Load discussions when page loads
        loadDiscussions();

        // Function to load discussions and replies
        async function loadDiscussions() {
            const url = window.location.pathname;
            const pathParts = url.split('/');
            const modul = pathParts[6];

            try {
                // Fetch discussions and replies
                const [discussionsResponse, repliesResponse] = await Promise.all([
                    fetch(discussionApiUrl),
                    fetch(replyApiUrl)
                ]);

                const discussionsData = await discussionsResponse.json();
                const repliesData = await repliesResponse.json();

                const filteredDiscussions = discussionsData.filter(discussion => discussion.ModulID == modul);

                const discussionList = document.getElementById('discussion-list');
                discussionList.innerHTML = '';

                if (filteredDiscussions.length === 0) {
                    discussionList.innerHTML = '<p class="text-gray-500">No discussions yet. Be the first to discussion!</p>';
                    return;
                }

                filteredDiscussions.forEach(discussion => {
                    const discussionItem = document.createElement('div');
                    discussionItem.className = 'border border-gray-200 rounded-lg p-4';

                    discussionItem.innerHTML = `
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-bold text-gray-800">${discussion.topics}</h4>
                            <span class="text-xs text-gray-500">${new Date(discussion.created_at).toLocaleString()}</span>
                        </div>
                        
                        <p class="text-gray-700 mb-3">${discussion.discussions}</p>
                        <button type="button" class="reply-button text-sm text-blue-600 hover:text-blue-800" data-id="${discussion.id}">
                            Reply
                        </button>
                        <div class="reply-list mt-3 space-y-3 pl-4 border-l-2 border-gray-200"></div>
                    `;

                    const replyList = discussionItem.querySelector('.reply-list');

                    // Find and display all matching replies
                    repliesData
                        .filter(reply => reply.DiscussionID == discussion.id)
                        .forEach(reply => {
                            const replyItem = document.createElement('div');
                            replyItem.className = 'bg-gray-50 p-3 rounded-lg';
                            replyItem.innerHTML = `
                                <div class="flex justify-between items-start mb-1">
                                    <h5 class="font-semibold text-gray-700">${reply.subtopic}</h5>
                                    <span class="text-xs text-gray-500">${new Date(reply.created_at).toLocaleString()}</span>
                                </div>
                                <p class="text-gray-700">${reply.replies}</p>
                            `;
                            replyList.appendChild(replyItem);
                        });

                    discussionList.appendChild(discussionItem);
                });

                // Setup reply button functionality
                document.querySelectorAll('.reply-button').forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const parentId = this.dataset.id;
                        document.getElementById('reply-parent-id').value = parentId;
                        document.getElementById('replyModal').classList.remove('hidden');
                    });
                });

                // Close modal button
                document.getElementById('close-reply-modal').addEventListener('click', function() {
                    document.getElementById('replyModal').classList.add('hidden');
                });

            } catch (error) {
                console.error('Error loading discussions or replies:', error);
                document.getElementById('discussion-list').innerHTML = 
                    '<p class="text-red-500">Error loading discussions. Please try again later.</p>';
            }
        }

        // Submit new discussion
        document.getElementById('discussion-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const url = window.location.pathname;
            const pathParts = url.split('/');
            const userId = pathParts[2];
            const modul = pathParts[4];

            try {
                const response = await fetch(discussionApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        topics: this.elements['topics'].value,
                        discussions: this.elements['discussions'].value,
                        ModulID: modul,
                        UserID: userId
                    })
                });

                if (response.ok) {
                    alert('Discussion posted successfully!');
                    this.reset();
                    loadDiscussions();
                } else {
                    const resData = await response.json();
                    alert('Failed to post discussion: ' + (resData.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error submitting discussion:', error);
                alert('An error occurred while posting your discussion.');
            }
        });

        // Submit reply
        document.getElementById('reply-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const parentId = document.getElementById('reply-parent-id').value;
            const subtopic = document.getElementById('reply-topic').value;
            const replies = document.getElementById('reply-discussion').value;

            const url = window.location.pathname;
            const pathParts = url.split('/');
            const userId = pathParts[2];

            try {
                const response = await fetch(replyApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        subtopic: subtopic,
                        replies: replies,
                        DiscussionID: parentId,
                        UserID: userId
                    })
                });

                if (response.ok) {
                    alert('Reply posted successfully!');
                    this.reset();
                    document.getElementById('replyModal').classList.add('hidden');
                    loadDiscussions();
                } else {
                    const resData = await response.json();
                    alert('Failed to post reply: ' + (resData.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error submitting reply:', error);
                alert('An error occurred while posting your reply.');
            }
        });
    
</script>
@endsection
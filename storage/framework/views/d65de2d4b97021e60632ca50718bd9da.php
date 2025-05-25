<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content-title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 min-h-screen">
    <div class="flex flex-col lg:flex-row gap-6 w-full">
        <!-- Left Sidebar - Profile Card -->
        <div class="w-full lg:w-1/3 bg-white rounded-xl shadow-md overflow-hidden p-6 flex flex-col items-center">
            <div class="relative mb-4">
                <img src="<?php echo e(asset('image/adobe1.jpg')); ?>" id="profile-pict" alt="Profile Picture" class="rounded-full w-32 h-32 object-fill border-4 border-blue-100">
                <button type="button" class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-1" id="name"></h2>
            <p class="text-gray-500 mb-4" id="uType"> Member</p>

            <div class="w-full">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Bio</h3>
                <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded-lg" id="bio">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae beatae officiis veniam
                    voluptatem explicabo temporibus doloremque, eaque voluptates.
                </p>
            </div>

            <div class="mt-6 w-full">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Account Details</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <p>Member since: <span class="date font-medium" id="regist_date">June 2023</span></p>
                </div>
            </div>
        </div>

        <!-- Right Section - Profile Form -->
        <div class="w-full lg:w-2/3 bg-white rounded-xl shadow-md overflow-hidden p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Personal Information</h1>

            <form id="profile-form" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- First Name -->
                    <div>
                        <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" id="firstname" name="firstname" value="Aldino"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" id="lastname" name="lastname" value="Rasendriya"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" value="aldino_r"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="aldino@example.com"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" value="+1234567890"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>

                <!-- User Type (Readonly) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Type</label>
                    <input type="text" readonly id="UserType"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-4 pt-6">
                    <button type="button" id="activate2faBtn" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        Activate 2-FA
                    </button>

                    <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const apiDeact2fa = 'http://localhost:3000/api/Accounts/disable-2fa';

    document.addEventListener('DOMContentLoaded', function() {
        const activate2faBtn = document.getElementById('activate2faBtn');
        const form = document.getElementById('profile-form');
        const apiUrl = 'http://localhost:3000/api/Accounts';
        const BASE_URL = 'http://localhost:8000/backend-uploads/';
        const profileUrl = 'http://localhost:3000/api/Profiles';
        const studentId = window.location.pathname.split('/')[2];

        fetchAkun(apiUrl, studentId);
        fetch(`${profileUrl}/${studentId}`)
            .then(response => response.json())
            .then(profileData => {
                console.log(profileData);
                document.getElementById('profile-pict').src = `${BASE_URL}${profileData.profile_picture}`;
                document.getElementById('bio').textContent = profileData.bio;
            });

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = {
                firstname: document.getElementById('firstname').value,
                lastname: document.getElementById('lastname').value,
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                phonenumber: document.getElementById('phone_number').value
            };

            try {
                const response = await fetch(`${apiUrl}/${studentId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to update profile');
                }

                await Swal.fire({
                    icon: 'success',
                    title: 'Profile updated successfully',
                    showConfirmButton: false,
                    timer: 1500
                });

            } catch (error) {
                console.error('Error updating profile:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Update Failed',
                    text: error.message || 'Please try again later.',
                    showConfirmButton: true
                });
            }
        });

        activate2faBtn.addEventListener('click', async function() {
            const email = document.getElementById('email').value;
            if (activate2faBtn.textContent.includes('Deactivate')) {
                const result = await Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to disable 2-FA on your account.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, disable it!'
                });

                if (result.isConfirmed) {
                    try {
                        const response = await fetch(apiDeact2fa, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                email
                            })
                        });

                        if (!response.ok) {
                            const errorData = await response.json();
                            throw new Error(errorData.message || 'Failed to disable 2-FA');
                        }

                        await Swal.fire({
                            icon: 'success',
                            title: '2-FA has been disabled.',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Reload account data to update button state
                        fetchAkun(apiUrl, studentId);

                    } catch (error) {
                        console.error('Error disabling 2-FA:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error.message || 'Failed to disable 2-FA'
                        });
                    }
                }

            } else {
                window.location.href = `/enable-twoFactor?email=${encodeURIComponent(email)}`;
            }
        });

        async function fetchAkun(apiUrl, studentId) {
            fetch(`${apiUrl}/${studentId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    document.getElementById('firstname').value = data.firstname;
                    document.getElementById('lastname').value = data.lastname;
                    document.getElementById('username').value = data.username;
                    document.getElementById('email').value = data.email;
                    document.getElementById('phone_number').value = data.phonenumber;
                    document.getElementById('UserType').value = data.User_Type;
                    document.getElementById('regist_date').textContent = new Date(data.regist_date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById('uType').textContent = `${data.User_Type} Member`;
                    document.getElementById('name').textContent = `${data.firstname} ${data.lastname}`;

                    if (data.twofa_secret) {
                        activate2faBtn.textContent = 'Deactivate 2-FA';
                        activate2faBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                        activate2faBtn.classList.add('bg-red-600', 'hover:bg-red-700');
                    } else {
                        activate2faBtn.textContent = 'Activate 2-FA';
                        activate2faBtn.classList.remove('bg-red-600', 'hover:bg-red-700');
                        activate2faBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    }
                });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\harit\OneDrive\Documents\GitHub\WebStudyIT\resources\views/user/profiles.blade.php ENDPATH**/ ?>
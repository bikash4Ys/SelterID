<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Evacuation Face Recognition</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dash/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php"><h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1></a>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <li><a href="dashboard.html" class="text-purple-500 hover:text-purple-700">Dashboard</a></li>
                <li><a href="#about" class="text-purple-500 hover:text-purple-700">About Us</a></li>
                <li><a href="login.html" class="text-purple-500 hover:text-purple-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Dashboard Content -->
    <section class="container mx-auto p-8 mt-24">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-700">Welcome to Your Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Profile Information -->
            <div class="col-span-1 bg-white p-6 shadow-lg rounded-lg card">
                <div class="flex items-center space-x-4">
                    <img src="uploads/Photo from Zahid Hasan (1).jpeg" alt="Profile Picture" class="rounded-full w-24 h-24 border-2 border-purple-500">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-700">John Doe</h2>
                        <p class="text-gray-500">johndoe@example.com</p>
                    </div>
                </div>
                <div class="mt-6">
                    <ul class="text-gray-700 space-y-2">
                        <li><strong>Date of Birth:</strong> 1990-01-01</li>
                        <li><strong>Gender:</strong> Male</li>
                        <li><strong>Phone:</strong> +123456789</li>
                        <li><strong>Address:</strong> 123 Hasan Zahid Avenue, Yokohama, Japan</li>
                        <li><strong>Emergency Contact:</strong> +987654321</li>
                    </ul>
                    <button class="mt-4 btn-primary px-4 py-2 rounded-md" id="editProfileBtn">Edit Profile</button>
                </div>
            </div>

            <!-- Evacuation Profile Management -->
            <div class="col-span-2 bg-white p-6 shadow-lg rounded-lg card">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Evacuation Status</h2>
                <div class="flex items-center space-x-4 mb-6">
                    <div class="text-2xl font-bold text-green-500">Registered</div>
                    <button class="btn-primary px-4 py-2 rounded-md" id="updateEvacuationBtn">Update Evacuation Info</button>
                </div>
                <p class="text-gray-700 mb-6">
                    You are successfully registered for the evacuation. Your face data is stored securely in our system and will be used during emergencies.
                </p>

                <h3 class="text-xl font-semibold mb-4 text-gray-600">Evacuation Instructions</h3>
                <p class="text-gray-600">
                    In case of an emergency, please proceed to the nearest shelter. Your face recognition data will be used to identify you at the shelter, allowing for a streamlined check-in process.
                </p>
            </div>

            <!-- Face Registration -->
            <div class="col-span-1 bg-white p-6 shadow-lg rounded-lg card">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Face Registration</h2>
                <p class="text-gray-700 mb-4">Your face is <span class="font-bold text-green-500">successfully registered</span> in the system.</p>
                <img src="https://via.placeholder.com/100" alt="Face Data Image" class="mb-4 rounded-lg border border-gray-300">
                <button class="btn-primary px-4 py-2 rounded-md" id="updateFaceDataBtn">Update Face Data</button>
            </div>

            <!-- Account Management -->
            <div class="col-span-2 bg-white p-6 shadow-lg rounded-lg card">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Account Management</h2>
                <ul class="text-gray-700 space-y-4">
                    <li><a href="#" class="text-purple-500 hover:underline" id="changePasswordBtn">Change Password</a></li>
                    <li><a href="#" class="text-purple-500 hover:underline">View Evacuation History</a></li>
                    <li><a href="#" class="text-purple-500 hover:underline">View Face Data</a></li>
                </ul>
            </div>

        </div>
    </section>

    <!-- Modals -->
    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="modal">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Edit Profile</h2>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="btn-secondary px-4 py-2 rounded-md" id="closeEditProfile">Cancel</button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Evacuation Info Modal -->
    <div id="updateEvacuationModal" class="modal">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">nearest evacaution center list</h2>
            <form>
                <div class="mb-4">
                    <label for="evacuationInfo" class="block text-sm font-medium text-gray-700">Evacuation Info</label>
                    <textarea id="evacuationInfo" name="evacuationInfo" rows="4" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="btn-secondary px-4 py-2 rounded-md" id="closeUpdateEvacuation">Cancel</button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-md">Update Info</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Face Data Modal -->
    <div id="updateFaceDataModal" class="modal">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Update Face Data</h2>
            <form>
                <div class="mb-4">
                    <label for="faceData" class="block text-sm font-medium text-gray-700">Face Data</label>
                    <input type="file" id="faceData" name="faceData" accept="image/*" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="btn-secondary px-4 py-2 rounded-md" id="closeUpdateFaceData">Cancel</button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-md">Update Face Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="changePasswordModal" class="modal">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Change Password</h2>
            <form>
                <div class="mb-4">
                    <label for="oldPassword" class="block text-sm font-medium text-gray-700">Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="newPassword" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="newPassword" name="newPassword" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="btn-secondary px-4 py-2 rounded-md" id="closeChangePassword">Cancel</button>
                    <button type="submit" class="btn-primary px-4 py-2 rounded-md">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 fade-in">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript to control modals -->
    <script>
        // Edit Profile Modal
        const editProfileModal = document.getElementById('editProfileModal');
        const editProfileBtn = document.getElementById('editProfileBtn');
        const closeEditProfile = document.getElementById('closeEditProfile');

        editProfileBtn.addEventListener('click', () => {
            editProfileModal.classList.add('active');
        });

        closeEditProfile.addEventListener('click', () => {
            editProfileModal.classList.remove('active');
        });

        // Update Evacuation Modal
        const updateEvacuationModal = document.getElementById('updateEvacuationModal');
        const updateEvacuationBtn = document.getElementById('updateEvacuationBtn');
        const closeUpdateEvacuation = document.getElementById('closeUpdateEvacuation');

        updateEvacuationBtn.addEventListener('click', () => {
            updateEvacuationModal.classList.add('active');
        });

        closeUpdateEvacuation.addEventListener('click', () => {
            updateEvacuationModal.classList.remove('active');
        });

        // Update Face Data Modal
        const updateFaceDataModal = document.getElementById('updateFaceDataModal');
        const updateFaceDataBtn = document.getElementById('updateFaceDataBtn');
        const closeUpdateFaceData = document.getElementById('closeUpdateFaceData');

        updateFaceDataBtn.addEventListener('click', () => {
            updateFaceDataModal.classList.add('active');
        });

        closeUpdateFaceData.addEventListener('click', () => {
            updateFaceDataModal.classList.remove('active');
        });

        // Change Password Modal
        const changePasswordModal = document.getElementById('changePasswordModal');
        const changePasswordBtn = document.getElementById('changePasswordBtn');
        const closeChangePassword = document.getElementById('closeChangePassword');

        changePasswordBtn.addEventListener('click', () => {
            changePasswordModal.classList.add('active');
        });

        closeChangePassword.addEventListener('click', () => {
            changePasswordModal.classList.remove('active');
        });
    </script>
</body>
</html>

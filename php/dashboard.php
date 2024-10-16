<?php
// dashboard.php

session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evacuation_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user info
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc(); // Fetch the logged-in user info

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css"> <!-- Link to external CSS -->
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-xl font-bold text-purple-600">SHELTER ID</a>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="text-gray-500 hover:text-gray-700">Home</a></li>
                <li><a href="dashboard.php" class="text-purple-600 font-semibold">Dashboard</a></li>
                <li><a href="login.php" class="text-gray-500 hover:text-gray-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-24 p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Profile Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center space-x-4 mb-6">
                    <label for="profilePic" class="cursor-pointer">
                    <img id="profileImage" src="<?php echo $user['profile_image'] ? $user['profile_image'] : 'https://via.placeholder.com/80'; ?>" alt="Profile Picture" class="rounded-full w-20 h-20 border-2 border-purple-500">
                        <input type="file" id="profilePic" accept="image/*" onchange="previewImage(event)" style="display: none;">
                    </label>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700"><?php echo $user['name']; ?></h2>
                        <p class="text-gray-500"><?php echo $user['email']; ?></p>
                    </div>
                </div>
                <div class="text-gray-700">
                    <p><strong>Gender:</strong> <?php echo ucfirst($user['gender']); ?></p>
                    <p><strong>DOB:</strong> <?php echo $user['dob']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $user['emergency_contact']; ?></p>
                    <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
                </div>
                <button class="mt-4 w-full bg-purple-500 text-white py-2 rounded-md">Edit Profile</button>
            </div>

            <!-- User Activity Overview -->
            <div class="col-span-2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Your Activities</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-purple-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-purple-600">Evacuation Status</h3>
                        <p class="text-gray-600 mt-2">Registered successfully for the evacuation.</p>
                        <button class="mt-4 w-full bg-purple-500 text-white py-2 rounded-md">Update Info</button>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-green-600">Shelter Access History</h3>
                        <p class="text-gray-600 mt-2">No recent visits to shelters.</p>
                        <button class="mt-4 w-full bg-green-500 text-white py-2 rounded-md">View History</button>
                    </div>
                </div>
            </div>

            <!-- Account Management -->
            <div class="col-span-2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Account Management</h2>
                <ul class="text-gray-700 space-y-4">
                    <li><a href="update.php" class="text-purple-500 hover:underline">Update Profile</a></li>
                    <li><a href="#" class="text-purple-500 hover:underline">Manage Evacuation Info</a></li>
                    <li><a href="#" class="text-purple-500 hover:underline">View Shelter Data</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Shelter ID. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/dashboard.js"></script> <!-- Include external JavaScript -->
</body>
</html>

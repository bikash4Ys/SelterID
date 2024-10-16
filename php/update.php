<?php
// update.php

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

// Update user information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $address = $conn->real_escape_string($_POST['address']);
    $emergency_contact = $conn->real_escape_string($_POST['emergency_contact']);
    
    // Handle file upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Path to the uploads directory
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // Update the database with the new image path
            $profile_image = $conn->real_escape_string($target_file);
            $sql = "UPDATE users SET profile_image='$profile_image' WHERE id=$user_id";
            $conn->query($sql);
        } else {
            echo "Error uploading the file.";
        }
    }

    // Update user details without changing the profile image
    $sql = "UPDATE users SET name='$name', email='$email', gender='$gender', dob='$dob', address='$address', emergency_contact='$emergency_contact' WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php"); // Redirect to dashboard after successful update
        exit();
    } else {
        $error_message = "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/update.css"> <!-- External CSS for update page -->
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-xl font-bold text-purple-600">SHELTER ID</a>
            <ul class="flex space-x-4">
                <li><a href="../index.php" class="text-gray-500 hover:text-gray-700">Home</a></li>
                <li><a href="dashboard.php" class="text-gray-500 hover:text-gray-700">Dashboard</a></li>
                <li><a href="logout.php" class="text-gray-500 hover:text-gray-700">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-24 p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            <h1 class="text-2xl font-bold text-gray-700 text-center mb-6">Update Your Information</h1>

            <?php if (isset($error_message)): ?>
                <div class="text-center text-red-500 mb-4"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="update.php" method="POST" class="space-y-4">
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium">Full Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Password (Optional) -->
                <div>
                    <label for="password" class="block text-sm font-medium">New Password (Optional):</label>
                    <input type="password" id="password" name="password" placeholder="Enter a new password" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium">Gender:</label>
                    <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                        <option value="male" <?php echo ($user['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo ($user['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                        <option value="other" <?php echo ($user['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm font-medium">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Emergency Contact -->
                <div>
                    <label for="emergency_contact" class="block text-sm font-medium">Emergency Contact:</label>
                    <input type="text" id="emergency_contact" name="emergency_contact" value="<?php echo $user['emergency_contact']; ?>" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Update Button -->
                <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-md">Update Info</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Shelter ID. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

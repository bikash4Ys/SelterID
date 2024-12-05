<?php
// register.php

// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // Update with your database username
$password = "";      // Update with your database password
$dbname = "evacuation_system";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for form data
$name = $email = $password = $gender = $dob = $address = $emergency_contact = $profile_image = "";
$responseMessage = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $gender = $conn->real_escape_string($_POST['gender']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $address = $conn->real_escape_string($_POST['address']);
    $emergency_contact = $conn->real_escape_string($_POST['emergencyContact']);

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // If email already exists, show error message
        $responseMessage = "Error: This email is already registered.";
    } else {
        // Handle file upload
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $allowedTypes = ['image/png', 'image/jpeg'];
            $fileType = mime_content_type($_FILES['profile_image']['tmp_name']);

            if (in_array($fileType, $allowedTypes)) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $profile_image = $conn->real_escape_string($target_file);
                } else {
                    $responseMessage = "Error uploading the file.";
                }
            } else {
                $responseMessage = "Error: Only PNG and JPG image files are allowed.";
            }
        }

        // Insert data into the database
        if (empty($responseMessage)) {
            $sql = "INSERT INTO users (name, email, password, gender, dob, address, emergency_contact, profile_image) 
                    VALUES ('$name', '$email', '$password', '$gender', '$dob', '$address', '$emergency_contact', '$profile_image')";

            if ($conn->query($sql) === TRUE) {
                $user_id = $conn->insert_id; // Fetch the last inserted ID
                $_SESSION['user_id'] = $user_id; // Store the user ID in the session
                header("Location: regist_face.php"); // Redirect to the face intro page
                exit();
            } else {
                $responseMessage = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/register.css"> <!-- Link to external CSS -->
</head>

<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../index.php">
                <h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1>
            </a>
            <ul class="flex space-x-4">
                <li><a href="../index.php" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <li><a href="login.php" class="text-purple-500 hover:text-purple-700">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-8 mt-24 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-700">Register</h1>

        <?php if (!empty($responseMessage)): ?>
            <div class="text-center mb-4 text-red-500">
                <?php echo $responseMessage; ?>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirmPassword" class="block text-sm font-medium">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Date of Birth -->
            <div>
                <label for="dob" class="block text-sm font-medium">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Gender -->
            <div>
                <label for="gender" class="block text-sm font-medium">Gender:</label>
                <select id="gender" name="gender" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                    <option value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Emergency Contact -->
            <div>
                <label for="emergencyContact" class="block text-sm font-medium">Emergency Contact:</label>
                <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Enter emergency contact"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Profile Image -->
            <div>
                <label for="profile_image" class="block text-sm font-medium">Profile Image (optional):</label>
                <input type="file" id="profile_image" name="profile_image" accept=".jpg, .jpeg, .png"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>


            <!-- Register Button -->
            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-md">Register</button>
            <a href="#" onclick="fillTestData()">Input Test Data</a>
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/test_input.js"></script>
</body>

</html>
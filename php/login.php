<?php
// login.php

// Database connection details
$servername = "localhost"; // Hostname (usually localhost)
$username = "root";         // Update with your database username
$password = "";             // Update with your database password
$dbname = "evacuation_system"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$email = $password = "";
$responseMessage = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch data
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start a session and redirect to dashboard
            session_start();
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            header("Location: dashboard.php");
            exit();
        } else {
            $responseMessage = "Incorrect password.";
        }
    } else {
        $responseMessage = "No user found with that email address.";
    }

    $conn->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Evacuation Face Recognition</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css"> <!-- Link to external CSS -->
</head>
<body>
    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../index.php"><h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1></a>
            <ul class="flex space-x-4">
                <li><a href="../index.php" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <li><a href="login.php" class="text-purple-500 hover:text-purple-700">Login</a></li>
                <li><a href="register.php" class="text-purple-500 hover:text-purple-700">Register</a></li>
                <li><a href="#about" class="text-purple-500 hover:text-purple-700">About Us</a></li>
                <li><a href="#contact" class="text-purple-500 hover:text-purple-700">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg bg-opacity-90 mt-24">
        <h1 class="text-2xl font-bold text-center mb-6">Login</h1>

        <?php if (!empty($responseMessage)): ?>
            <div class="text-center mb-4 text-red-500">
                <?php echo $responseMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="login.php" method="POST" class="space-y-4">
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Show Password Checkbox -->
            <div>
                <input type="checkbox" id="showPassword" class="mr-2">
                <label for="showPassword" class="text-sm">Show Password</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-md">Login</button>

            <!-- Link to Registration -->
            <p class="text-sm text-center mt-4">
                Don't have an account? <a href="register.php" class="text-purple-500 underline">Register here</a>.
            </p>
        </form>

        <!-- Login Message -->
        <div id="loginMessage" class="mt-4"></div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>

    <!-- Footer -->
    <!-- <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer> -->
    <!-- Footer -->
<footer class="fixed bottom-0 left-0 w-full bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
    </div>
</footer>

</body>
</html>

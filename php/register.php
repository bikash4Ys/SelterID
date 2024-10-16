<?php
// register.php

// Database connection details
$servername = "localhost"; // Hostname (usually localhost)
$username = "root";         // Update with your database username
$password = "";             // Update with your database password
$dbname = "evacuation_system"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // Fixed the variable name $username

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for form data
$name = $email = $password = $gender = $dob = $address = $emergency_contact = "";

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

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, password, gender, dob, address, emergency_contact) 
            VALUES ('$name', '$email', '$password', '$gender', '$dob', '$address', '$emergency_contact')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success.php after successful registration
        header("Location: success.php");
        exit();
    } else {
        $responseMessage = "Error: " . $sql . "<br>" . $conn->error;
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
            <a href="../index.php"><h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1></a>
            <ul class="flex space-x-4">
                <li><a href="../index.php" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <!-- <li><a href="dashboard.php" class="text-purple-500 hover:text-purple-700">Dashboard</a></li> -->
                <li><a href="login.php" class="text-purple-500 hover:text-purple-700">login</a></li>
                <!-- <li><a href="#about" class="text-purple-500 hover:text-purple-700">About Us</a></li> -->
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

        <form action="register.php" method="POST" class="space-y-4">
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
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required
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
                <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Enter emergency contact" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full bg-purple-500 text-white py-2 rounded-md">Register</button>
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

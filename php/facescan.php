<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Capture</title>
    <link href="../css/facescan.css" rel="stylesheet"> <!-- Link to external CSS -->
</head>
<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">

    <!-- Main Content -->
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-center mb-4">Face Capture</h1>
        <video id="video" width="320" height="240" autoplay class="mx-auto"></video>
        <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
        <div class="mt-4">
            <button id="captureBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hidden">Capture</button>
            <button id="nextBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hidden">Next</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 w-full">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Shelter ID. All rights reserved.</p>
        </div>
    </footer>

    <div id="userData" data-user-id="<?php echo $user_id; ?>"></div> <!-- Pass user ID via data attribute -->
    <script src="../js/facescan.js"></script> <!-- Link to external JavaScript -->
</body>
</html>

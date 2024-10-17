<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Capture Instructions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-24 p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-4">Face Capture Instructions</h1>
        <p class="mb-4">Welcome! Before you proceed to the face capture, please read the following instructions:</p>
        <ul class="list-disc pl-5 mb-4">
            <li>Ensure you are in a well-lit area.</li>
            <li>Position your face directly in front of the camera for optimal capture.</li>
            <li>The system will capture a total of 20 images:</li>
            <ul class="list-disc pl-5">
                <li>10 images facing straight ahead.</li>
                <li>5 images while slightly turning your head to the left.</li>
                <li>5 images while slightly turning your head to the right.</li>
            </ul>
            <li>Click the "Ready" button when you are prepared to start capturing.</li>
        </ul>
        <div class="flex justify-between">
            <a href="facescan.php" class="bg-purple-500 text-white px-4 py-2 rounded-md">Next</a>
            <button onclick="document.getElementById('readyModal').classList.remove('hidden')" class="bg-green-500 text-white px-4 py-2 rounded-md">Ready</button>
        </div>
    </div>

    <!-- Ready Modal -->
    <div id="readyModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Are you ready to capture your face?</h2>
            <div class="flex justify-between">
                <button onclick="document.getElementById('readyModal').classList.add('hidden'); openCamera();" class="bg-purple-500 text-white px-4 py-2 rounded-md">Start Capture</button>
                <button onclick="document.getElementById('readyModal').classList.add('hidden');" class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function openCamera() {
            // Redirect to the facescan page
            window.location.href = 'facescan.php';
        }
    </script>

    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Shelter ID. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

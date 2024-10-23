<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reception Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.html">
                <h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1>
            </a>
            <ul class="flex space-x-4">
                <li><a href="reception.html" class="text-purple-500 hover:text-purple-700">Reception</a></li>
                <li><a href="register.html" class="text-purple-500 hover:text-purple-700">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-8 mt-24 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-700">Reception Details for John Doe</h1>

        <div class="flex flex-col items-center space-y-6">
            <!-- User Photo -->
            <img src="images/profile_placeholder.jpg" alt="Profile Image" class="h-32 w-32 object-cover rounded-full border border-gray-300 shadow-md">

            <!-- User Info (as a table) -->
            <div class="w-full max-w-md bg-gray-50 p-6 rounded-lg shadow-md">
                <!-- Table-like structure using divs -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="font-bold">User ID:</div>
                    <div>12345</div>

                    <div class="font-bold">Name:</div>
                    <div>John Doe</div>

                    <div class="font-bold">Email:</div>
                    <div>john.doe@example.com</div>

                    <div class="font-bold">Gender:</div>
                    <div>Male</div>

                    <div class="font-bold">Date of Birth:</div>
                    <div>1990-01-01</div>

                    <div class="font-bold">Address:</div>
                    <div>123 Main St, Yokohama, Japan</div>

                    <div class="font-bold">Emergency Contact:</div>
                    <div>080-1234-5678</div>

                    <div class="font-bold">Reception Date & Time:</div>
                    <div>2024-10-23 14:00</div>
                </div>
            </div>

            <!-- Recept List Link -->
            <div class="mt-6">
                <a href="recept_list.php" class="bg-purple-600 text-white py-2 px-4 rounded-md shadow hover:bg-purple-700 transition duration-200">
                    Back to Recept List
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>

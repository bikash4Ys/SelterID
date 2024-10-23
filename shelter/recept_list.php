<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Reception List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script> <!-- Ensure JS loads after DOM is ready -->
</head>

<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php">
                <h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1>
            </a>
            <ul class="flex space-x-4">
                <li><a href="reception.php" class="text-purple-500 hover:text-purple-700">Reception</a></li>
                <li><a href="register.php" class="text-purple-500 hover:text-purple-700">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="text-center py-20 fade-in">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-8">Reception List</h2>

            <!-- Reception List Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Photo</th>
                            <th class="px-4 py-2">Reception Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='border px-4 py-2'>1</td>
                            <td class='border px-4 py-2'><a href="recept_detail.php">Alice</a></td>
                            <td class='border px-4 py-2'><img src="" alt='Profile Image' class='h-16 w-16 object-cover rounded-full'></td>
                            <td class='border px-4 py-2'>2024/10/12 15:31</td>
                        </tr>
                        <tr>
                            <td class='border px-4 py-2'>2</td>
                            <td class='border px-4 py-2'>Bob</td>
                            <td class='border px-4 py-2'><img src="" alt='Profile Image' class='h-16 w-16 object-cover rounded-full'></td>
                            <td class='border px-4 py-2'>2024/10/12 15:38</td>
                        </tr>
                        <tr>
                            <td class='border px-4 py-2'>3</td>
                            <td class='border px-4 py-2'>Chris</td>
                            <td class='border px-4 py-2'><img src="" alt='Profile Image' class='h-16 w-16 object-cover rounded-full'></td>
                            <td class='border px-4 py-2'>2024/10/12 16:31</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 fade-in">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
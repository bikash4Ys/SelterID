<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Not Registered List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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

    <!-- Hero Section -->
    <header id="home" class="text-center py-20 fade-in">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-8">Not Registered List</h2>
            <p class="text-gray-600 mb-6">These individuals have not yet registered in the evacuation system.</p>

            <!-- Not Registered List Table -->
            <div class="overflow-x-auto px-4">
                <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                    <thead class="bg-red-600 text-white">
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Photo</th>
                            <th class="px-4 py-2">Last Seen Date & Time</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">101</td>
                            <td class="border px-4 py-2">Alex</td>
                            <td class="border px-4 py-2">
                                <img src="https://via.placeholder.com/150" alt="Alex's Profile Image" class="h-16 w-16 object-cover rounded-full">
                            </td>
                            <td class="border px-4 py-2">2024/10/23 14:00</td>
                            <td class="border px-4 py-2">
                                <a href="register.html" class="text-blue-500 hover:underline">Register Now</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">102</td>
                            <td class="border px-4 py-2">Bella</td>
                            <td class="border px-4 py-2">
                                <img src="https://via.placeholder.com/150" alt="Bella's Profile Image" class="h-16 w-16 object-cover rounded-full">
                            </td>
                            <td class="border px-4 py-2">2024/10/22 16:15</td>
                            <td class="border px-4 py-2">
                                <a href="register.html" class="text-blue-500 hover:underline">Register Now</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">103</td>
                            <td class="border px-4 py-2">Charlie</td>
                            <td class="border px-4 py-2">
                                <img src="https://via.placeholder.com/150" alt="Charlie's Profile Image" class="h-16 w-16 object-cover rounded-full">
                            </td>
                            <td class="border px-4 py-2">2024/10/20 10:30</td>
                            <td class="border px-4 py-2">
                                <a href="register.html" class="text-blue-500 hover:underline">Register Now</a>
                            </td>
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

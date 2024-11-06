<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../js/main.js" defer></script> <!-- Ensure JS loads after DOM is ready -->
</head>

<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white" aria-label="Main Navigation">
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
    <header id="home" class="text-center py-20 mt-16 fade-in">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-4">Shelter Reception</h2>
            <p class="mb-8 text-lg text-gray-600 max-w-md mx-auto">Welcome to Shelter Reception. Use our face recognition system to streamline your check-in process efficiently and securely.</p>

            <!-- Button Group -->
            <div class="space-y-4 md:space-y-0 md:space-x-4 flex flex-col md:flex-row justify-center items-center">
                <p class="text-lg text-gray-700 mb-4">Webカメラ軌道で受付</p>

                <form action="add.php" method="post">
                    <!-- Reception Button -->
                    <input type="text" name="user_id" value="1">
                    <button href="add.php" class="bg-purple-600 text-white py-4 px-8 rounded-lg text-xl font-semibold hover:bg-purple-700 transition duration-300 ease-in-out">
                        受付
                    </button>
                </form>

                <!-- Back Button -->
                <a href="./" class="bg-gray-300 text-gray-800 py-4 px-8 rounded-lg text-xl font-semibold hover:bg-gray-400 transition duration-300 ease-in-out">
                    Back
                </a>
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
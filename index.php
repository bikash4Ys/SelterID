<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script> <!-- Ensure JS loads after DOM is ready -->
</head>
<body class="bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400">

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php"><h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1></a>
            <ul class="flex space-x-4">
                <li><a href="#home" class="text-purple-500 hover:text-purple-700">Home</a></li>
                <li><a href="php/login.php" class="text-purple-500 hover:text-purple-700">Login</a></li>
                <li><a href="php/register.php" class="text-purple-500 hover:text-purple-700">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="text-center py-20 text-white fade-in">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-4">Welcome to the Evacuation Face Recognition System</h2>
            <p class="text-lg mb-6">Ensure safe evacuation during emergencies with advanced facial recognition technology.</p>
            <a href="php/login.php" class="bg-purple-500 text-white px-6 py-3 rounded-md text-lg hover:bg-purple-700">Get Started</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 fade-in">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-10 text-purple-600">Our Features</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md fade-in">
                    <h4 class="text-xl font-bold text-purple-500 mb-4">Fast Recognition</h4>
                    <p>Our system ensures fast and accurate facial recognition for smooth evacuation processes.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md fade-in">
                    <h4 class="text-xl font-bold text-purple-500 mb-4">Real-Time Monitoring</h4>
                    <p>Monitor evacuation progress in real-time with our advanced dashboard features.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md fade-in">
                    <h4 class="text-xl font-bold text-purple-500 mb-4">Secure Data</h4>
                    <p>All data is securely stored with encryption to ensure privacy and protection.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 fade-in">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

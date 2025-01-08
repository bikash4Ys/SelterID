<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Home</title>
    <meta name="description" content="Efficient shelter reception system using face recognition technology to streamline check-in for pre-registered and non-registered evacuees.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/main.js" defer></script> <!-- Ensure JS loads after DOM is ready -->
</head>

<body>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white" aria-label="Main Navigation">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../">
                <h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1>
            </a>
            <ul class="flex space-x-4">
                <li><a href="./" class="text-purple-500 hover:text-purple-700">Reception</a></li>
                <li><a href="../php/register.php" class="text-purple-500 hover:text-purple-700">Register</a></li>
                <li><a href="recept_list.php" class="text-purple-500 hover:text-purple-700">Recept List</a></li>
                <li><a href="#about" class="text-purple-500 hover:text-purple-700">About</a></li>
                <li><a href="#how-it-works" class="text-purple-500 hover:text-purple-700">How it Works</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="text-center py-20 mt-16 fade-in bg-gradient-to-r from-teal-400 to-purple-600 text-white">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-8">Welcome to Shelter Reception</h2>
            <p class="mb-8 max-w-xl mx-auto">Efficient, reliable, and secure check-in for evacuees using advanced face recognition technology.</p>

            <!-- Buttons -->
            <div class="space-y-8">
                <div>
                    <a href="recept/" class="bg-teal-600 text-white py-4 px-8 rounded-lg text-xl font-semibold hover:bg-purple-700 transition duration-300 ease-in-out">
                        避難者受付（事前登録済みの方）
                    </a>
                </div>
                <div>
                    <a href="../php/register.php" class="bg-purple-600 text-white py-4 px-8 rounded-lg text-xl font-semibold hover:bg-purple-700 transition duration-300 ease-in-out">
                        避難者受付（事前登録済みでない方）
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-4">About Shelter ID</h3>
            <p class="max-w-2xl mx-auto mb-8">Shelter ID is a modern solution for streamlining the reception process at evacuation shelters, utilizing face recognition technology for quick and secure identification. We provide options for both pre-registered and non-registered individuals to ensure a smooth check-in experience.</p>
        </div>
    </section>

    <!-- How it Works Section -->
    <section id="how-it-works" class="py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-4">How It Works</h3>
            <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0 text-left justify-center items-center">
                <!-- Step 1 -->
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Step 1: Pre-Registration</h4>
                    <p>Evacuees can pre-register their details and a photo, making check-in seamless and fast during emergencies.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Step 2: Face Recognition</h4>
                    <p>Upon arrival, the system uses advanced face recognition to identify pre-registered individuals accurately.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white shadow-md p-6 rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Step 3: Confirmation</h4>
                    <p>Once identified, the evacuee's details are confirmed, and they proceed to their assigned shelter area with ease.</p>
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

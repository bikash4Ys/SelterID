<?php
session_start();

$error = "";
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShelterID -避難所受付-</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../js/env.js" defer></script>
    <script src="../../js/receipt.js" defer></script>
</head>

<body>
    <div id="loading" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
        <div class="w-16 h-16 border-4 border-teal-600 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <!-- Navbar -->
    <nav class="p-4 shadow-md fixed w-full top-0 z-10 bg-white" aria-label="Main Navigation">
        <div class="container mx-auto flex justify-between items-center">
            <a href="../../">
                <h1 class="text-xl font-bold text-purple-600">SHELTER ID</h1>
            </a>
            <ul class="flex space-x-4">
                <li><a href="../" class="text-purple-500 hover:text-purple-700">Reception</a></li>
                <li><a href="../recept_list.php" class="text-purple-500 hover:text-purple-700">Reception List</a></li>
                <li><a href="../../php/register.php" class="text-purple-500 hover:text-purple-700">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <main id="home" class="py-10 mt-6">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold p-1">避難者受付</h2>
            <!-- Video and Reception List Side by Side -->
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <!-- Video Section -->
                <div class="flex-grow md:w-2/3">
                    <!-- カメラ映像を表示するビデオタグ -->
                    <video id="video" width="640" height="480" autoplay class="mt-4 w-full"></video>

                    <!-- キャプチャした画像を保持するキャンバス -->
                    <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>

                    <!-- Button Group -->
                    <div class="my-2 text-center">
                        <form id="receipt-form" action="add.php" method="post">
                            <!-- Reception Button -->
                            <input type="hidden" id="user-ids" name="user_ids" value="">
                        </form>

                    </div>
                </div>

                <!-- Reception List Section -->
                <div class="flex-grow md:w-1/3">
                    <div class="my-2 py-2">

                        <!-- Recept -->
                        <button onclick="onRecepts()" class="w-64 bg-teal-600 text-white py-4 px-8 rounded-lg text-xl font-semibold hover:bg-teal-700 transition duration-300 ease-in-out">
                            受付
                        </button>
                        <!-- Response message -->
                        <div id="responseMessage" class="text-center text-red-500 p-1">
                            <?= $error ?>
                        </div>
                        <table class="table-auto border-collapse border border-gray-300 w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="text-left border border-gray-300 px-4 py-2 w-[20%]">受付時間</th>
                                    <th class="text-left border border-gray-300 px-4 py-2 w-[30%]">氏名</th>
                                </tr>
                            </thead>
                            <tbody id="receptionTableBody">
                                <!-- Rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="py-6 my-4 text-center space-x-2">
                <a href="../../php/register.php" class="bg-purple-600 text-white py-4 px-8 rounded-lg text-xl font-semibold hover:bg-purple-700 transition duration-300 ease-in-out">
                    事前登録済みでない方
                </a>
                <!-- Back Button -->
                <a href="../" class="bg-gray-300 text-gray-800 py-4 px-8 rounded-lg text-xl font-semibold hover:bg-gray-400 transition duration-300 ease-in-out">
                    Back
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 fade-in">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Yokohama System Engineering College. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
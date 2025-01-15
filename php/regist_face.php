<?php
session_start();

if (empty($_SESSION['user_id'])) {
    header("Location: ../php/login.php");
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div id="loadingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-lg font-semibold">Processing...</p>
        </div>
    </div>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Regist faces</h1>

        <div id="message" class="mt-4 text-green-500"></div>

        <div id="video-area" class="flex flex-col items-center"> <!-- flex-colで縦並び、items-centerで中央寄せ -->
            <input type="file" id="photo" class="hidden">
            <video id="video" width="640" height="480" autoplay style="display:none;" class="mt-4"></video>

            <!-- ボタンを縦並びに配置 -->
            <div class="mt-4">
                <button onclick="onCapture()" type="button" id="captureBtn" class="bg-purple-500 text-white px-3 py-2 rounded-md">Ready</button>
            </div>
        </div>

        <div id="canvas-area" class="flex my-4">

        </div>

        <input type="hidden" name="user_id" id="user-id" value="<?= $user_id ?>">

        <div class="mt-4 flex flex-col items-center space-y-4">
            <button onclick="regist()" type="button" class="bg-purple-500 text-white px-3 py-2 rounded-md">Regist Images</button>
            <button onclick="window.location.href='login.php'" type="button" class="bg-white text-sky-500 px-3 py-2 rounded-md">Home</button>
        </div>



        <script src="../js/env.js" defer></script>
        <script src="../js/regist_face.js" defer></script>
</body>

</html>
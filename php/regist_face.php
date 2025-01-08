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

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Regist faces</h1>

        <div class="container mx-auto mt-2 p-8 bg-white rounded-lg shadow-lg">
            <p class="mb-4">Welcome! Before you proceed to the face capture, please read the following instructions:</p>
            <ul class="list-disc pl-5 mb-4">
                <li>Ensure you are in a well-lit area.</li>
                <li>Position your face directly in front of the camera for optimal capture.</li>
                <li>The system will capture a total of 5 images:</li>
                <ul class="list-disc pl-5">
                    <li>5 images facing straight ahead.</li>
                </ul>
                <li>Click the "Ready" button when you are prepared to start capturing.</li>
            </ul>
           
        </div>

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
    <button onclick="window.location.href='login.php'" type="button" class="bg-purple-500 text-white px-3 py-2 rounded-md">Home</button>
</div>

   

    <script src="../js/env.js" defer></script>
    <script src="../js/regist_face.js" defer></script>
</body>

</html>
<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evacuation_system";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all entries from the receptions table and join with users table to get the name
    // Assuming the `users` table has an `id` column
    $stmt = $pdo->query("SELECT receptions.user_id, users.name, receptions.recepted_at 
                         FROM receptions 
                         LEFT JOIN users ON receptions.user_id = users.id 
                         ORDER BY recepted_at DESC");
    $receptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Face Recognition - Reception List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            <div class="overflow-x-auto px-4">
                <table class="min-w-full table-auto bg-white shadow-lg rounded-lg">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Reception Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receptions as $reception): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= htmlspecialchars($reception['user_id']); ?></td>
                                <td class="border px-4 py-2">
                                    <a href="recept_detail.php?id=<?= htmlspecialchars($reception['user_id']); ?>" class="text-purple-500 hover:underline">
                                        <?= htmlspecialchars($reception['name']); ?>
                                    </a>
                                </td>
                                <td class="border px-4 py-2"><?= htmlspecialchars($reception['recepted_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
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

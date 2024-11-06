<?php
// recept_data array data
$recept_data['user_id'] = $_POST['user_id'];
$recept_data['recepted_at'] = date('Y-m-d H:i:s');

try {
    // Database connection
    $username = 'root';
    $password = '';
    $db_name = "evacuation_system";
    $host = "localhost";

    $dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if user_id already exists in the receptions table
    $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM receptions WHERE user_id = :user_id");
    $checkStmt->execute([':user_id' => $recept_data['user_id']]);
    $exists = $checkStmt->fetchColumn();

    if ($exists == 0) {
        // Only insert if user_id does not already exist in the receptions table
        $stmt = $pdo->prepare("INSERT INTO receptions (user_id, recepted_at) VALUES (:user_id, :recepted_at)");
        $stmt->execute([
            ':user_id' => $recept_data['user_id'],
            ':recepted_at' => $recept_data['recepted_at'],
        ]);
        header('Location: complete.php');
        exit;
    } else {
        echo "User ID:" . $recept_data['user_id'] ." already exists in the receptions list.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
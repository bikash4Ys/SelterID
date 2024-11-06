<?php
// db_connection.php

$host = 'localhost';
$db_name = 'evacuation_system';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>

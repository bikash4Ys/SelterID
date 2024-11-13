<?php
// Database connection
$username = 'root';
$password = '';
$db_name = "evacuation_system";
$host = "localhost";

$dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";
$pdo = new PDO($dsn, $username, $password);

// Set PDO to throw exceptions on errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

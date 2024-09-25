<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evacuation_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if (!empty($_FILES['photo']['name'])) {
        $targetDir = "uploads/";
        $photoName = basename($_FILES['photo']['name']);
        $targetFilePath = $targetDir . $photoName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {

                // Insert into the database
                $stmt = $conn->prepare("INSERT INTO users (name, email, phone, photo_path) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $phone, $targetFilePath);
                $stmt->execute();
                $stmt->close();

                $response = ['message' => 'Registration successful!'];
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
    }
}

$conn->close();
?>

<?php
session_start();

// ユーザーがログインしているか確認
if (!isset($_SESSION['user_id'])) {
    exit;
}

// データベース接続
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evacuation_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

$user_id = $_SESSION['user_id'];

// ファイルが送信されているか確認
if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profilePic']['tmp_name'];
    $fileName = $_FILES['profilePic']['name'];
    $fileSize = $_FILES['profilePic']['size'];
    $fileType = $_FILES['profilePic']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // サポートされるファイル拡張子を確認
    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // アップロードディレクトリを設定
        $uploadFileDir = '../uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }
        $newFileName = $user_id . '_' . time() . '.' . $fileExtension;
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // データベースに画像パスを保存
            $sql = "UPDATE users SET profile_image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $dest_path, $user_id);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Profile image updated', 'path' => $dest_path]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update profile image in database']);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Unsupported file type']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded or upload error occurred']);
}

$conn->close();
?>
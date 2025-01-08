<?php
// DB接続
require_once "../db.php";

// タームゾーン設定
date_default_timezone_set('Asia/Tokyo');

header('Content-Type: application/json');

// JSONデータを取得
$request = file_get_contents('php://input');
$data = json_decode($request, true);

if (!isset($data['user_ids']) || !is_array($data['user_ids'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid input. user_ids must be provided as an array.'
    ]);
    exit;
}

try {
    // 複数のユーザーIDを処理
    $receptions = recepts($pdo, $data['user_ids']);

    // レスポンスを返す
    echo json_encode([
        'status' => 'success',
        'data' => $receptions
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

/**
 * 複数の受付処理を行う
 *
 * @param PDO $pdo
 * @param array $user_ids
 * @return array
 */
function recepts($pdo, $user_ids) {
    $receptions = [];
    foreach ($user_ids as $user_id) {
        $receptions[] = recept($pdo, $user_id);
    }
    return $receptions;
}

/**
 * 単一のユーザー受付処理
 *
 * @param PDO $pdo
 * @param int $user_id
 * @return array
 * @throws Exception
 */
function recept($pdo, $user_id) {
    try {
        $recept_data['recepted_at'] = date('Y-m-d H:i:s');

        // 既存の受付データを確認
        $stmt = $pdo->prepare("SELECT * FROM receptions WHERE user_id = :user_id");
        $stmt->execute([':user_id' => $user_id]);
        $reception = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$reception) {
            // 新規に受付データを挿入
            $stmt = $pdo->prepare("INSERT INTO receptions (user_id, recepted_at) VALUES (:user_id, :recepted_at)");
            $stmt->execute([
                ':user_id' => $user_id,
                ':recepted_at' => $recept_data['recepted_at'],
            ]);
            $lastInsertId = $pdo->lastInsertId();

            // 挿入した受付データを取得
            $stmt = $pdo->prepare("SELECT * FROM receptions WHERE id = :id");
            $stmt->execute([':id' => $lastInsertId]);
            $reception = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // ユーザー情報を取得してレスポンスに追加
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
        $stmt->execute([':user_id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found for user_id: $user_id");
        }

        $reception['user'] = $user;

        return $reception;
    } catch (PDOException $e) {
        throw new Exception("Database error: " . $e->getMessage());
    }
}
?>
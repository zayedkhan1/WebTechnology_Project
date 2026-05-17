<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($userId <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid User ID']);
        exit();
    }

    $stmt = $conn->prepare("SELECT is_active FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'User not found']);
        exit();
    }

    $newStatus = ((int)$result['is_active'] === 1) ? 0 : 1;

    $update = $conn->prepare("UPDATE users SET is_active = ? WHERE id = ?");
    $update->bind_param("ii", $newStatus, $userId);
    
    if ($update->execute()) {
        echo json_encode([
            'success' => true, 
            'new_status' => $newStatus,
            'label' => ($newStatus === 1) ? 'Active' : 'Inactive'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database update failed']);
    }
    $update->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
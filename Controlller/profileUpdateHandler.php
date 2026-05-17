<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $currentPass = $_POST['current_password'] ?? '';
    $newPass = $_POST['new_password'] ?? '';

    if (empty($name) || empty($phone) || empty($dob) || empty($currentPass)) {
        header("Location: ../View/patient_profile.php?error=" . urlencode("Required fields cannot be empty."));
        exit();
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $userData = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($userData && password_verify($currentPass, $userData['password'])) {
        if (!empty($newPass)) {
            if (strlen($newPass) < 6) {
                header("Location: ../View/patient_profile.php?error=" . urlencode("New password must be at least 6 characters."));
                exit();
            }
            $hashedPass = password_hash($newPass, PASSWORD_BCRYPT);
            $update = $conn->prepare("UPDATE users SET name=?, phone=?, dob=?, password=? WHERE id=?");
            $update->bind_param("ssssi", $name, $phone, $dob, $hashedPass, $userId);
        } else {
            $update = $conn->prepare("UPDATE users SET name=?, phone=?, dob=? WHERE id=?");
            $update->bind_param("sssi", $name, $phone, $dob, $userId);
        }
        
        if ($update->execute()) {
            $_SESSION['name'] = $name;
            $update->close();
            header("Location: ../View/patient_profile.php?success=1");
            exit();
        } else {
            $update->close();
            header("Location: ../View/patient_profile.php?error=" . urlencode("Database update failed."));
            exit();
        }
    } else {
        header("Location: ../View/patient_profile.php?error=" . urlencode("Incorrect current password."));
        exit();
    }
}
?>
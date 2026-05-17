<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header("Location: ../View/login.php?error=All fields are required");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, name, password, role, is_active FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            
            if ((int)$user['is_active'] === 0) {
                $stmt->close();
                header("Location: ../View/login.php?error=Your account is deactivated by Admin");
                exit();
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            $stmt->close();

            if ($user['role'] === 'admin') {
                header("Location: ../View/admin_dashboard.php");
            } elseif ($user['role'] === 'doctor') {
                header("Location: ../View/doctor_dashboard.php");
            } else {
                header("Location: ../View/patient_dashboard.php");
            }
            exit();
        } else {
            $stmt->close();
            header("Location: ../View/login.php?error=Invalid email or password");
            exit();
        }
    } else {
        $stmt->close();
        header("Location: ../View/login.php?error=Invalid email or password");
        exit();
    }
} else {
    header("Location: ../View/login.php");
    exit();
}
?>
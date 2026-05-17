<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $dob = trim($_POST['dob'] ?? '');
    $blood_group = trim($_POST['blood_group'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

  
    if (empty($name) || empty($email) || empty($password) || empty($dob) || empty($blood_group) || empty($phone)) {
        header("Location: ../View/registration.php?error=All fields are required");
        exit();
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../View/registration.php?error=Invalid email format");
        exit();
    }

   
    if (strlen($password) < 6) {
        header("Location: ../View/registration.php?error=Password must be at least 6 characters");
        exit();
    }

  
    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();
    
    if ($checkEmail->num_rows > 0) {
        $checkEmail->close();
        header("Location: ../View/registration.php?error=Email already exists");
        exit();
    }
    $checkEmail->close();

    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
   
    $role = 'patient'; 
    $is_active = 1;

    
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, dob, blood_group, phone, role, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $name, $email, $hashedPassword, $dob, $blood_group, $phone, $role, $is_active);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../View/login.php?success=Registration successful! Login now.");
        exit();
    } else {
        $stmt->close();
        header("Location: ../View/registration.php?error=Registration failed. Try again.");
        exit();
    }
} else {
    header("Location: ../View/registration.php");
    exit();
}
?>
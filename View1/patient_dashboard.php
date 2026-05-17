<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'patient') {
    header("Location: login.php?error=Please login first");
    exit();
}

$passengerName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Patient';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <div class="navbar">
        <h1>Patient Dashboard</h1>
        <div class="nav-links">
            <a href="patient_profile.php">My Profile</a>
            <a href="../Controlller/logout.php">Logout</a>
        </div>
    </div>

    <div class="dashboard-content-area">
        <div class="dashboard-card">
            
            <h2 class="dashboard-title">
                Welcome, <?php echo htmlspecialchars($passengerName); ?>!
            </h2>
            
            <p class="dashboard-desc">
                You are securely logged into your personal medical workspace panel. Use the navigation bar above to view your upcoming metrics, update your profile infrastructure, or securely terminate your session data.
            </p>
            
        </div>
    </div>

</body>
</html>
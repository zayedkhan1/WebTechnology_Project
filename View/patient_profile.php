<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'patient') {
    header("Location: login.php?error=Please login first");
    exit();
}

$userId = $_SESSION['user_id'];


$stmt = $conn->prepare("SELECT name, phone, dob FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$currentName = $user['name'] ?? '';
$currentPhone = $user['phone'] ?? '';
$currentDob = $user['dob'] ?? '';


$appointments = [];
$checkTable = $conn->query("SHOW TABLES LIKE 'appointments'");

if ($checkTable && $checkTable->num_rows > 0) {
    $apptStmt = $conn->prepare("SELECT doctor_name, appointment_date, appointment_time, status FROM appointments WHERE patient_id = ? ORDER BY appointment_date ASC");
    $apptStmt->bind_param("i", $userId);
    $apptStmt->execute();
    $apptResult = $apptResult = $apptStmt->get_result();
    while ($row = $apptResult->fetch_assoc()) {
        $appointments[] = $row;
    }
    $apptStmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <div class="navbar">
        <h1>Profile Management</h1>
        <div class="nav-links">
            <a href="patient_dashboard.php">Dashboard</a>
            <a href="../Controlller/logout.php">Logout</a>
        </div>
    </div>

    <div class="profile-container">
        <h2>Update Profile Details</h2>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert-error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="../Controlller/profileUpdateHandler.php" method="POST">
            
            <div class="input-group">
                <label>Full Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($currentName); ?>" required>
            </div>

            <div class="input-group">
                <label>Phone Number:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($currentPhone); ?>" required>
            </div>

            <div class="input-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($currentDob); ?>" required>
            </div>

            <h3>Security Verification</h3>
            
            <div class="input-group">
                <label>Current Password (Required to save changes):</label>
                <input type="password" name="current_password" placeholder="Enter your current password" required>
            </div>

            <div class="input-group">
                <label>New Password (Optional):</label>
                <input type="password" name="new_password" placeholder="Leave blank to keep same">
            </div>

            <button type="submit" class="submit-btn">Save Profile Changes</button>
        </form>

        <h3>Upcoming Appointments</h3>
        
        <?php if (!empty($appointments)): ?>
            <div class="appointment-table-container">
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appt): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appt['doctor_name']); ?></td>
                                <td><?php echo htmlspecialchars($appt['appointment_date']); ?></td>
                                <td><?php echo htmlspecialchars($appt['appointment_time']); ?></td>
                                <td>
                                    <?php if (strtolower($appt['status']) === 'confirmed'): ?>
                                        <span class="badge badge-confirmed">Confirmed</span>
                                    <?php else: ?>
                                        <span class="badge badge-pending">Pending</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="appointment-status-box">
                <p>📅 No Active Appointments Scheduled At This Time</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
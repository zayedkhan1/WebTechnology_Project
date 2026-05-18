<?php
include '../Model/db.php';

// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'admin') {
//     header("Location: login.php");
//     exit;
// }

// ============================
// TOTAL TODAY APPOINTMENTS
// ============================

$today_sql = "SELECT COUNT(*) AS total_today 
              FROM appointments 
              WHERE DATE(created_at) = CURDATE()";

$today_result = mysqli_query($con, $today_sql);
$today_data = mysqli_fetch_assoc($today_result);

$total_today = $today_data['total_today'];


// ============================
// TOTAL APPOINTMENTS
// ============================

$total_app_sql = "SELECT COUNT(*) AS total_appointments FROM appointments";

$total_app_result = mysqli_query($con, $total_app_sql);
$total_app_data = mysqli_fetch_assoc($total_app_result);

$total_appointments = $total_app_data['total_appointments'];


// ============================
// TOTAL DOCTORS
// ============================

$doctor_sql = "SELECT COUNT(*) AS total_doctors FROM doctors";

$doctor_result = mysqli_query($con, $doctor_sql);
$doctor_data = mysqli_fetch_assoc($doctor_result);

$total_doctors = $doctor_data['total_doctors'];


// ============================
// TOTAL USERS
// ============================

$user_sql = "SELECT COUNT(*) AS total_users FROM users";

$user_result = mysqli_query($con, $user_sql);
$user_data = mysqli_fetch_assoc($user_result);

$total_users = $user_data['total_users'];


// ============================
// RECENT APPOINTMENTS
// ============================

$recent_sql = "
    SELECT 
        a.id,
        a.created_at,
        a.status,
        u.name,
        d.doc_name
    FROM appointments a
    JOIN users u ON a.email = u.email
    JOIN doctors d ON a.doc_id = d.id
    ORDER BY a.created_at DESC
    LIMIT 5
";

$recent_result = mysqli_query($con, $recent_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vet Appointment Admin</title>
<link rel="stylesheet" href="css/admin.css">

</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a href="home.php" class="logo">Appointix</a>

    <ul class="nav-links">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Appointments</a></li>
        <li><a href="#">Doctors</a></li>
    </ul>
</nav>

<!-- Dashboard Layout -->
<div class="admin-container">

    <!-- Sidebar -->
    <aside class="sidebar">

        <h3>Admin Menu</h3>

        <ul>
            <li><a href="admin.php">📊 Dashboard</a></li>
            <li><a href="admin_manageAppoinments.php">📅 Manage Appointments</a></li>
            <li><a href="manage_doc.php">👨‍⚕️ Manage Doctors</a></li>
            <li><a href="#">⚙️ Settings</a></li>
        </ul>

    </aside>

    <!-- Main Content -->
    <main class="admin-main">

        <h2>Appointix Appointment Dashboard</h2>

        <!-- Cards -->
        <div class="cards">

            <div class="card">
                <h3>Today’s Appointments</h3>
                <p><?php echo $total_today; ?></p>
            </div>

            <div class="card">
                <h3>Total Appointments</h3>
                <p><?php echo $total_appointments; ?></p>
            </div>

            <div class="card">
                <h3>Total Doctors</h3>
                <p><?php echo $total_doctors; ?></p>
            </div>

            <div class="card">
                <h3>Total Users</h3>
                <p><?php echo $total_users; ?></p>
            </div>

        </div>

        <!-- Recent Appointments Table -->
        <div class="table-box">

            <h3>Recent Appointments</h3>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Doctor Name</th>
                        <th>Created Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                 $serial = 0;
                while($row = mysqli_fetch_assoc($recent_result)){
                   
                    $statusClass = "";

                    if($row['status'] == "Approved"){
                        $statusClass = "status-approved";
                    }
                    elseif($row['status'] == "Pending"){
                        $statusClass = "status-pending";
                    }
                    else{
                        $statusClass = "status-cancelled";
                    }
                    $serial++;

                    echo "
                    <tr>
                        <td>$serial</td>
                        <td>{$row['name']}</td>
                        <td>{$row['doc_name']}</td>
                        <td>{$row['created_at']}</td>
                        <td class='$statusClass'>{$row['status']}</td>
                    </tr>
                    ";
                }

                ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>
</html>
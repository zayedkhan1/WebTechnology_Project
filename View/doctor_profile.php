<?php
include '../Model/db.php';
session_start();

// CHECK LOGIN
// if(!isset($_SESSION['id'])){
//     header("location: login.php");
//     exit;
// }

// GET DOCTOR ID FROM SESSION
$doc_id = $_SESSION['id'];

// FETCH DOCTOR DATA
$sql = "SELECT doc_name,doc_specialty, consult_fee,available_days,
        FROM doctors 
        WHERE doc_id='$doc_id'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
}else{
    echo "Doctor not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Profile</title>

<link rel="stylesheet" href="css/doctorProfile.css">
</head>
<body>

<?php include 'shared/navbar.php'; ?>

<div class="profile-page">

    <div class="profile-card">

        <!-- ================= HEADER ================= -->
        <div class="profile-header">

            <div class="profile-avatar">
                🩺
            </div>

            <h2>
                <?php echo $row['name']; ?>
            </h2>

            <p>Doctor Profile</p>

        </div>

        <!-- ================= INFO ================= -->
        <div class="profile-info">

            <div class="info-row">
                <span>Email</span>
                <span><?php echo $row['email']; ?></span>
            </div>

            <div class="info-row">
                <span>Phone</span>
                <span><?php echo $row['phone']; ?></span>
            </div>

            <div class="info-row">
                <span>Specialty</span>
                <span><?php echo $row['specialty']; ?></span>
            </div>

            <div class="info-row">
                <span>Experience</span>
                <span><?php echo $row['experience']; ?> Years</span>
            </div>

            <div class="info-row">
                <span>Joined</span>
                <span><?php echo $row['dt']; ?></span>
            </div>

        </div>

        <!-- ================= ACTIONS ================= -->
        <div class="profile-actions">

            <a href="editDoctorProfile.php" class="profile-btn">
                Edit Profile
            </a>

            <a href="doctorAppointments.php" class="profile-btn secondary">
                My Appointments
            </a>

        </div>

    </div>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
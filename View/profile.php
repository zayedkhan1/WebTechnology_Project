<?php
include '../Model/db.php';
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }
$role = $_SESSION['role']; // "doctor" or "patient"
$email = $_SESSION['email'];

$sql = "SELECT name, email, phone, dt FROM users WHERE email='$email'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
}else{
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>

<link rel="stylesheet" href="css/profile.css">
</head>
<body>

<?php include 'shared/navbar.php'; ?>

<div class="profile-page">

    <div class="profile-card">

        <!-- ================= HEADER ================= -->
        <div class="profile-header">

            <div class="profile-avatar">
                👤
            </div>

            <h2>
                <?php echo $row['name']; ?>
            </h2>

            <p>User Account</p>

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
                <span>Joined</span>
                <span><?php echo $row['dt']; ?></span>
            </div>

        </div>

        <!-- ================= ACTIONS ================= -->

        <div class="profile-actions">

            <a href="editUserProfile.php" class="profile-btn">
                Edit Profile
            </a>
<!-- if role is patient i want to show this button  -->
            <!-- <a href="myAppoinment.php" class="profile-btn secondary">
                My Appointments
            </a> -->
           
            <!-- if role is doctor then i want ot show this button  -->
            <!-- <a href="doctor_appoinment.php" class="profile-btn secondary">
                Doctor Appointments
            </a> -->

                <?php if($role == "Patient"){ ?>
        <!-- PATIENT BUTTON -->
        <a href="myAppoinment.php" class="profile-btn secondary">
            My Appointments
        </a>
    <?php } ?>


    <?php if($role == "Doctor"){ ?>
        <!-- DOCTOR BUTTON -->
        <a href="doctor_appoinment.php" class="profile-btn secondary">
            Doctor Appointments
        </a>
    <?php } ?>

        </div>

    </div>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
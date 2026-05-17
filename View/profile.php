<?php
include '../Controller/db/db.php';
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

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

<style>

        /* ================= GLOBAL ================= */
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f4ff;
        }

        /* ================= PROFILE WRAPPER ================= */

        .profile-page{
            width:100%;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 20px;
        }

        /* ================= PROFILE CARD ================= */

        .profile-card{
            width:100%;
            max-width:550px;
            background:#fff;
            border-radius:25px;
            padding:40px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
            text-align:center;
            transition:0.3s;
        }

        .profile-card:hover{
            transform:translateY(-5px);
        }

        /* ================= HEADER ================= */

        .profile-header{
            margin-bottom:30px;
        }

        .profile-avatar{
            width:90px;
            height:90px;
            background:#ede9fe;
            color:#6d28d9;
            font-size:40px;
            display:flex;
            justify-content:center;
            align-items:center;
            border-radius:50%;
            margin:0 auto 15px auto;
            font-weight:bold;
        }

        .profile-header h2{
            font-size:28px;
            color:#222;
            margin-bottom:5px;
        }

        .profile-header p{
            color:#7c3aed;
            font-weight:bold;
        }

        /* ================= INFO ================= */

        .profile-info{
            background:#f8f5ff;
            padding:20px;
            border-radius:15px;
            text-align:left;
            margin-bottom:25px;
        }

        .info-row{
            display:flex;
            justify-content:space-between;
            padding:12px 0;
            border-bottom:1px solid #e5e7eb;
        }

        .info-row:last-child{
            border-bottom:none;
        }

        .info-row span:first-child{
            font-weight:bold;
            color:#444;
        }

        .info-row span:last-child{
            color:#333;
        }

        /* ================= BUTTONS ================= */

        .profile-actions{
            display:flex;
            gap:15px;
            justify-content:center;
            flex-wrap:wrap;
        }

        .profile-btn{
            text-decoration:none;
            background:#7c3aed;
            color:#fff;
            padding:12px 22px;
            border-radius:12px;
            font-weight:bold;
            transition:0.3s;
        }

        .profile-btn:hover{
            background:#5b21b6;
        }

        .profile-btn.secondary{
            background:#e5e7eb;
            color:#333;
        }

        .profile-btn.secondary:hover{
            background:#d1d5db;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:600px){

            .profile-card{
                padding:25px;
            }

            .profile-header h2{
                font-size:22px;
            }

        }

</style>

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

            <a href="myAppoinment.php" class="profile-btn secondary">
                My Appointments
            </a>

        </div>

    </div>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
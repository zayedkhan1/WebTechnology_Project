<?php 
// session_start();
include '../Controller/db/db.php';

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
//     header("location: login.php");
//     exit;
// }

$sql = "SELECT * FROM doctors"; 
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f4ff;
        }

        /* ===== Main Section ===== */

        .doctor-section{
            width:100%;
            min-height:100vh;
            padding:50px 8%;
        }

        .doctor-title{
            text-align:center;
            margin-bottom:50px;
        }

        .doctor-title h1{
            font-size:42px;
            color:#5b21b6;
            margin-bottom:10px;
        }

        .doctor-title p{
            color:#666;
            font-size:17px;
        }

        /* ===== Doctor Cards ===== */

        .doctor-container{
            display:grid;
            grid-template-columns:repeat(2,minmax(320px,1fr));
            gap:30px;
        }

        .doctor-card{
            background:#fff;
            border-radius:20px;
            padding:30px;
            box-shadow:0 8px 25px rgba(0,0,0,0.08);
            transition:0.3s;
            border-top:5px solid #7c3aed;
        }

        .doctor-card:hover{
            transform:translateY(-8px);
        }

        .doctor-header{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:20px;
        }

        .doctor-image{
            width:70px;
            height:70px;
            border-radius:50%;
            background:#ede9fe;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            color:#6d28d9;
            font-weight:bold;
        }

        .doctor-info h2{
            font-size:24px;
            color:#222;
            margin-bottom:5px;
        }

        .doctor-info p{
            color:#7c3aed;
            font-weight:bold;
            font-size:15px;
        }

        .doctor-details{
            margin-top:15px;
        }

        .detail-box{
            background:#f8f5ff;
            padding:12px 15px;
            border-radius:10px;
            margin-bottom:12px;
        }

        .detail-box span{
            font-weight:bold;
            color:#5b21b6;
            display:block;
            margin-bottom:5px;
        }

        .detail-box p{
            color:#444;
            line-height:1.6;
            font-size:15px;
        }

        /* ===== Fee Badge ===== */

        .fee{
            margin-top:20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .fee h3{
            color:#16a34a;
            font-size:24px;
        }

        .book-btn{
            text-decoration:none;
            background:#7c3aed;
            color:#fff;
            padding:12px 22px;
            border-radius:10px;
            transition:0.3s;
            font-weight:bold;
        }

        .book-btn:hover{
            background:#5b21b6;
        }

        /* ===== No Doctor ===== */

        .no-data{
            text-align:center;
            color:#777;
            font-size:20px;
            margin-top:50px;
        }

        @media(max-width:768px){

            .doctor-title h1{
                font-size:32px;
            }

            .doctor-card{
                padding:20px;
            }

        }

    </style>

</head>
<body>

<?php include 'shared/navbar.php'; ?>

<section class="doctor-section">

    <div class="doctor-title">
        <h1>Our Expert Doctors</h1>
        <p>Book appointments with experienced and trusted specialists.</p>
    </div>

    <div class="doctor-container">

        <?php 
        
        if($result && mysqli_num_rows($result) > 0){

            while($doctor = mysqli_fetch_assoc($result)){

        ?>

            <div class="doctor-card">

                <div class="doctor-header">

                    <div class="doctor-image">
                        <?php echo strtoupper(substr($doctor['doc_name'],0,1)); ?>
                    </div>

                    <div class="doctor-info">
                        <h2><?php echo $doctor['doc_name']; ?></h2>
                        <p><?php echo $doctor['doc_specility']; ?></p>
                    </div>

                </div>

                <div class="doctor-details">

                    <div class="detail-box">
                        <span>Available Days</span>
                        <p><?php echo $doctor['available_days']; ?></p>
                    </div>

                    <div class="detail-box">
                        <span>Doctor Bio</span>
                        <p><?php echo $doctor['doc_bio']; ?></p>
                    </div>

                    <div class="detail-box">
                        <span>Consultation Fee</span>
                        <h3 style="color: #16a34a; font-size: 20px;"> <?php echo $doctor['consult_fee']; ?></h3>
                    </div>

                </div>

                <div class="fee">
                    

                    <!-- <a href="bookAppoinment.php" class="book-btn">
                        Book Appointment Now
                    </a> -->
                    <?php 
                  echo '<a  class="book-btn" href="bookAppoinment.php?doc_id='.$doctor['id'].'">Book Appointment</a>';

                    ?>
                </div>

            </div>

        <?php

            }

        }else{

            echo "<p class='no-data'>No Doctors Found.</p>";

        }

        ?>

    </div>

</section>

<?php include 'shared/footer.php'; ?>

</body>
</html>
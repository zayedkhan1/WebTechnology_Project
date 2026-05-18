<?php 
// session_start();
include '../Model/db.php';

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
 
     <link rel="stylesheet" href="css/doctors.css">

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
<?php
include '../Model/db.php';
session_start();

// ================= LOGIN CHECK =================

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
}

// ================= CHECK DOCTOR ID =================

if(!isset($_GET['doc_id'])){
    die("Invalid Doctor. Please go back and select a doctor.");
}

$doc_id = (int)$_GET['doc_id'];
$email = $_SESSION['email'];

// ================= GET DOCTOR INFO =================

$doctorQuery = "SELECT * FROM doctors WHERE id = $doc_id";
$doctorResult = mysqli_query($con, $doctorQuery);

$doctor = mysqli_fetch_assoc($doctorResult);

if(!$doctor){
    die("Doctor not found.");
}

// ================= BOOK APPOINTMENT =================

$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $problem = $_POST['problem'];
    $requested_date = $_POST['requested_date'];
    $requested_time = $_POST['requested_time'];

    $sql = "INSERT INTO appointments
    (doc_id, email, problem, requested_date, requested_time, status)

    VALUES

    ('$doc_id', '$email', '$problem', '$requested_date', '$requested_time', 'pending')";

    $result = mysqli_query($con, $sql);

    if($result){
        $success = "Appointment Request Sent Successfully!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>


</head>
<body>

<?php include 'shared/navbar.php'; ?>

<div class="appointment-container">

    <div class="appointment-card">

        <!-- ================= TITLE ================= -->

        <div class="appointment-title">
            <h1>Book Appointment</h1>
            <p>Schedule your appointment with your preferred doctor.</p>
        </div>

        <!-- ================= SUCCESS MESSAGE ================= -->

        <?php
            if($success){
                echo "<div class='success'>$success</div>";
            }
        ?>

        <!-- ================= DOCTOR INFO ================= -->

        <div class="doctor-info">

            <h2>
                Dr. <?php echo $doctor['doc_name']; ?>
            </h2>

            <p>
                <span>Speciality:</span>
                <?php echo $doctor['doc_specility']; ?>
            </p>

            <p>
                <span>Consult Fee:</span>
                ৳ <?php echo $doctor['consult_fee']; ?>
            </p>

            <p>
                <span>Available Days:</span>
                <?php echo $doctor['available_days']; ?>
            </p>

        </div>

        <!-- ================= FORM ================= -->

        <form method="POST" class="appointment-form">

            <div class="input-group">

                <label>Describe Your Problem</label>

                <textarea 
                    name="problem"
                    placeholder="Write your health problem..."
                    required
                ></textarea>

            </div>

            <div class="input-group">

                <label>Preferred Date</label>

                <input 
                    type="date"
                    name="requested_date"
                    required
                >

            </div>

            <div class="input-group">

                <label>Preferred Time</label>

                <input 
                    type="time"
                    name="requested_time"
                    required
                >

            </div>

            <button type="submit" class="submit-btn">
                Request Appointment
            </button>

        </form>

    </div>

</div>
 <?php include 'shared/footer.php'; ?>
</body>
</html>
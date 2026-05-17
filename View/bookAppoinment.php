<?php
include '../Controller/db/db.php';
session_start();

// ================= LOGIN CHECK =================

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
//     header("location: login.php");
//     exit;
// }

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

        /* ================= MAIN CONTAINER ================= */

        .appointment-container{
            width:100%;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 20px;
        }

        /* ================= CARD ================= */

        .appointment-card{
            width:100%;
            max-width:700px;
            background:#fff;
            border-radius:20px;
            padding:40px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        /* ================= TITLE ================= */

        .appointment-title{
            text-align:center;
            margin-bottom:35px;
        }

        .appointment-title h1{
            color:#6d28d9;
            font-size:36px;
            margin-bottom:10px;
        }

        .appointment-title p{
            color:#666;
            font-size:16px;
        }

        /* ================= DOCTOR INFO ================= */

        .doctor-info{
            background:#f8f5ff;
            padding:20px;
            border-radius:15px;
            margin-bottom:30px;
            border-left:5px solid #7c3aed;
        }

        .doctor-info h2{
            color:#5b21b6;
            margin-bottom:10px;
        }

        .doctor-info p{
            margin-bottom:8px;
            color:#444;
            line-height:1.6;
        }

        .doctor-info span{
            font-weight:bold;
            color:#6d28d9;
        }

        /* ================= SUCCESS MESSAGE ================= */

        .success{
            background:#dcfce7;
            color:#166534;
            padding:14px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;
            font-weight:bold;
        }

        /* ================= FORM ================= */

        .appointment-form{
            display:flex;
            flex-direction:column;
            gap:20px;
        }

        .input-group{
            display:flex;
            flex-direction:column;
        }

        .input-group label{
            margin-bottom:8px;
            font-weight:bold;
            color:#444;
        }

        .input-group textarea,
        .input-group input{
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            outline:none;
            font-size:15px;
            transition:0.3s;
        }

        .input-group textarea{
            resize:none;
            min-height:120px;
        }

        .input-group textarea:focus,
        .input-group input:focus{
            border-color:#7c3aed;
        }

        /* ================= BUTTON ================= */

        .submit-btn{
            background:#7c3aed;
            color:white;
            border:none;
            padding:15px;
            border-radius:12px;
            font-size:17px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .submit-btn:hover{
            background:#5b21b6;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            .appointment-card{
                padding:25px;
            }

            .appointment-title h1{
                font-size:28px;
            }

        }

    </style>

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
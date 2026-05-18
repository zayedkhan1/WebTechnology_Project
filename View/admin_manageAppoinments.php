<?php
include '../Model/db.php';
session_start();

// ================= ADMIN CHECK =================

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['role'] != 'admin'){
//     header("location: login.php");
//     exit;
// }

// ================= APPROVE APPOINTMENT =================

$success = "";

if(isset($_POST['approve'])){

    $appointment_id = (int)$_POST['appointment_id'];

    $approved_date = $_POST['approved_date'];

    $approved_time = $_POST['approved_time'];

    $sql = "UPDATE appointments
 
            SET 
            status = 'approved',
            approved_date = '$approved_date',
            approved_time = '$approved_time'

            WHERE id = $appointment_id";

    $result = mysqli_query($con, $sql);

    // if($result){
    //         // STORE IN SESSION
    //     $_SESSION['approved_date'][$appointment_id] = $approved_date;
    //     $_SESSION['approved_time'][$appointment_id] = $approved_time;
        
    //     $success = "Appointment Approved Successfully!";
    // }
}

// ================= FETCH PENDING APPOINTMENTS =================

$sql = "SELECT a.*, d.doc_name

        FROM appointments a
   
        JOIN doctors d
        ON a.doc_id = d.id

        WHERE a.status = 'pending'

        ORDER BY a.created_at ASC";

$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Appointments</title>

    <link rel="stylesheet" href="css/adminManagement.css">

</head>

<body>

<?php include 'shared/navbar.php'; ?>

<div class="admin-main">

    <h2>Pending Appointment Requests</h2>

    <?php
        if($success){
            echo "<div class='success'>$success</div>";
        }
    ?>

    <?php if(mysqli_num_rows($result) > 0): ?>

    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>User Email</th>
                    <th>Doctor</th>
                    <th>Problem</th>
                    <th>Requested Date</th>
                    <th>Requested Time</th>
                    <th>Status</th>
                    <th>Approve Appointment</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)): ?>

                <tr>

                    <td>
                        <?= $row['id'] ?>
                    </td>

                    <td>
                        <?= $row['email'] ?>
                    </td>

                    <td>
                        Dr. <?= $row['doc_name'] ?>
                    </td>

                    <td>
                        <?= $row['problem'] ?>
                    </td>

                    <td>
                       <?= date("d F, Y", strtotime($row['requested_date'])) ?>
                    </td>

                    <td>
                        <?= date("h:i A", strtotime($row['requested_time'])) ?>
                    </td>

                    <td>
                        <span class="pending">
                            Pending
                        </span>
                    </td>

                    <td>

                        <form method="POST" class="approve-form">

                            <input 
                                type="hidden"
                                name="appointment_id"
                                value="<?= $row['id'] ?>"
                            >

                            <input 
                                type="date"
                                name="approved_date"
                                required
                            >

                            <input 
                                type="time"
                                name="approved_time"
                                required
                            >

                            <button 
                                type="submit"
                                name="approve"
                                class="approve-btn"
                            >
                                Approve
                            </button>

                        </form>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

    <?php else: ?>

        <div class="no-data">
            No Pending Appointments Found.
        </div>

    <?php endif; ?>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
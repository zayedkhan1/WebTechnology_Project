<?php
include '../Controller/db/db.php';
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

    if($result){
        $success = "Appointment Approved Successfully!";
    }
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

        /* ================= CONTAINER ================= */

        .admin-main{
            width:90%;
            max-width:1400px;
            margin:50px auto;
            background:#fff;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        /* ================= TITLE ================= */

        .admin-main h2{
            text-align:center;
            margin-bottom:30px;
            color:#6d28d9;
            font-size:36px;
        }

        /* ================= SUCCESS MESSAGE ================= */

        .success{
            background:#dcfce7;
            color:#166534;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;
            font-weight:bold;
        }

        /* ================= TABLE ================= */

        .table-container{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table thead{
            background:#7c3aed;
            color:white;
        }

        table th{
            padding:16px;
            text-align:left;
            font-size:15px;
        }

        table td{
            padding:16px;
            border-bottom:1px solid #eee;
            vertical-align:top;
            font-size:15px;
        }

        table tbody tr{
            transition:0.3s;
        }

        table tbody tr:hover{
            background:#f8f5ff;
        }

        /* ================= INPUTS ================= */

        .approve-form{
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .approve-form input{
            padding:10px;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            font-size:14px;
        }

        .approve-form input:focus{
            border-color:#7c3aed;
        }

        /* ================= BUTTON ================= */

        .approve-btn{
            background:#7c3aed;
            color:white;
            border:none;
            padding:10px;
            border-radius:8px;
            cursor:pointer;
            transition:0.3s;
            font-weight:bold;
        }

        .approve-btn:hover{
            background:#5b21b6;
        }

        /* ================= STATUS ================= */

        .pending{
            background:#fef3c7;
            color:#92400e;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
            font-weight:bold;
            display:inline-block;
        }

        /* ================= NO DATA ================= */

        .no-data{
            text-align:center;
            color:#666;
            font-size:18px;
            padding:30px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            .admin-main{
                width:95%;
                padding:20px;
            }

            .admin-main h2{
                font-size:28px;
            }

            table th,
            table td{
                padding:12px;
                font-size:14px;
            }

        }

    </style>



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
                        <?= $row['requested_date'] ?>
                    </td>

                    <td>
                        <?= $row['requested_time'] ?>
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
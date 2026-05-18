<?php
session_start();
include '../Controller/db/db.php';

// if(!isset($_SESSION['doctor_id'])){
//     header("location: login.php");
//     exit;
// }

$doctor_id = $_SESSION['id'];

$sql = "SELECT * FROM appointments 
        WHERE doc_id = '$doctor_id'
        ORDER BY created_at DESC";

$result = mysqli_query($con, $sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor Appointments</title>

<style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f4f6f9;
        }

        /* Header */
        .header{
            background:#0d6efd;
            color:white;
            padding:20px;
            text-align:center;
            font-size:22px;
            font-weight:bold;
        }

        /* Container */
        .container{
            width:90%;
            margin:30px auto;
        }

        /* Card */
        .card{
            background:white;
            padding:20px;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }

        /* Table */
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
            overflow:hidden;
            border-radius:10px;
        }

        th{
            background:#0d6efd;
            color:white;
            padding:12px;
            text-align:left;
            font-size:14px;
        }

        td{
            padding:12px;
            border-bottom:1px solid #eee;
            font-size:14px;
        }

        tr:hover{
            background:#f1f7ff;
        }

        /* Status */
        .status{
            padding:5px 10px;
            border-radius:20px;
            font-size:12px;
            color:white;
            display:inline-block;
        }

        .pending{ background:orange; }
        .approved{ background:green; }
        .cancelled{ background:red; }

        /* Responsive */
        @media(max-width:768px){
            table, th, td{
                font-size:12px;
            }
        }
</style>

</head>

<body>

<div class="header">
    My Appointments Dashboard
</div>

<div class="container">
    <div class="card">

        <h3>Appointments List</h3>

        <table>
            <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['problem']; ?></td>
                <td><?php echo $row['requested_date']; ?></td>
                <td>
                    <?php 
                    $status = strtolower($row['status']);
                    ?>
                  
                </td>
            </tr>

            <?php } ?>

        </table>
    </div>
</div>

</body>
</html>
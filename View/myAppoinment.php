<?php
include '../Controller/db/db.php';
session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

$user_email = $_SESSION['email'];

// ================= FIXED QUERY =================
$sql = "SELECT a.*, v.doc_name  
        FROM appointments a
        JOIN doctors v ON a.doc_id = v.id
        WHERE a.email = '$user_email'
        ORDER BY a.created_at DESC";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Appointments</title>

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

        /* ================= PAGE WRAPPER ================= */
        .page-wrapper{
            width:100%;
            min-height:100vh;
            padding:50px 20px;
            display:flex;
            justify-content:center;
        }

        /* ================= CONTAINER ================= */
        .container{
            width:100%;
            max-width:1100px;
            background:#fff;
            border-radius:20px;
            padding:35px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        /* ================= TITLE ================= */
        .title{
            text-align:center;
            margin-bottom:30px;
        }

        .title h1{
            font-size:36px;
            color:#6d28d9;
            margin-bottom:8px;
        }

        .title p{
            color:#666;
            font-size:15px;
        }

        /* ================= TABLE ================= */
        .table-wrapper{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            min-width:800px;
        }

        thead{
            background:#7c3aed;
            color:white;
        }

        th{
            padding:15px;
            text-align:left;
            font-size:15px;
        }

        td{
            padding:15px;
            border-bottom:1px solid #eee;
            font-size:14px;
        }

        tbody tr:hover{
            background:#f8f5ff;
        }

        /* ================= STATUS ================= */
        .status{
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
            font-weight:bold;
            display:inline-block;
        }

        .approved{
            background:#dcfce7;
            color:#166534;
        }

        .pending{
            background:#fef3c7;
            color:#92400e;
        }

        .rejected{
            background:#fee2e2;
            color:#991b1b;
        }

        /* ================= EMPTY ================= */
        .empty{
            text-align:center;
            padding:40px;
            color:#666;
            font-size:18px;
        }

        /* ================= RESPONSIVE ================= */
        @media(max-width:768px){
            .container{
                padding:20px;
            }

            .title h1{
                font-size:28px;
            }
        }

</style>

</head>
<body>

<?php include 'shared/navbar.php'; ?>

<div class="page-wrapper">

<div class="container">

    <!-- TITLE -->
    <div class="title">
        <h1>My Appointments</h1>
        <p>Track all your appointment requests and their status</p>
    </div>

    <!-- TABLE -->
    <?php if(mysqli_num_rows($result) > 0): ?>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Problem</th>
                    <th>Requested Date</th>
                    <th>Status</th>
                    <th>Approved Date/Time</th>
                </tr>
            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)): ?>

                <?php
                    $status = strtolower($row['status']);

                    if($status == 'approved'){
                        $statusClass = "approved";
                    }
                    elseif($status == 'pending'){
                        $statusClass = "pending";
                    }
                    else{
                        $statusClass = "rejected";
                    }
                ?>

                <tr>

                    <td>
                        Dr. <?= htmlspecialchars($row['doc_name']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['problem']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['requested_date']) ?>
                    </td>

                    <td>
                        <span class="status <?= $statusClass ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>

                    <td>
<?php



$id = $row['id'];

if(isset($_SESSION['approved_date'][$id])){

    echo date("d F, Y", strtotime($_SESSION['approved_date'][$id]));
    echo " | ";

    echo date("h:i A", strtotime($_SESSION['approved_time'][$id]));

}else{
    echo "-";
}

?>
</td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

    <?php else: ?>

        <div class="empty">
            You don’t have any appointments yet.
        </div>

    <?php endif; ?>

</div>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
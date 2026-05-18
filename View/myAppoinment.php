<?php
include '../Model/db.php';
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


<link rel="stylesheet" href="css/myAppoinment.css">
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
                      <?= date("d F, Y", strtotime($row['requested_date'])) ?>
                    </td>

                    <td>
                        <span class="status <?= $statusClass ?>">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    </td>

                    <td>
<?php
$approvedDate = $row['approved_date'] ?? null;
$approvedTime = $row['approved_time'] ?? null;

if (!empty($approvedDate) && !empty($approvedTime)) {

    echo date("d F, Y", strtotime($approvedDate));
    echo " | ";
    echo date("h:i A", strtotime($approvedTime));

} else {
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
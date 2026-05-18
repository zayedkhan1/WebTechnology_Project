<?php
include "../Model/db.php";

// ================= CHECK ID =================
if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$id = $_GET['id'];

// ================= DELETE QUERY =================
$sql = "DELETE FROM doctors WHERE id='$id'";
$result = mysqli_query($con, $sql);

// ================= REDIRECT =================
if ($result) {
    header("Location: manage_doc.php?msg=deleted");
    exit();
} else {
    echo "Failed to delete doctor!";
}
?>
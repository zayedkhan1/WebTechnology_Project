<?php
include "../Model/db.php";

$success = "";
$error = "";

// ================= GET DOCTOR ID =================
if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$id = $_GET['id'];

// ================= FETCH EXISTING DATA =================
$sql = "SELECT * FROM doctors WHERE id='$id'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Doctor not found!");
}

$doctor = mysqli_fetch_assoc($result);

// ================= UPDATE DOCTOR =================
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doc_id         = $_POST['doc_id'];
    $doc_name       = $_POST['doc_name'];
    $doc_specility  = $_POST['doc_specility'];
    $consult_fee    = $_POST['consult_fee'];
    $available_days = $_POST['available_days'];
    $doc_bio        = $_POST['doc_bio'];
    $doc_image      = $_POST['doc_image'];

    $updateSql = "UPDATE doctors SET 
        doc_id='$doc_id',
        doc_name='$doc_name',
        doc_specility='$doc_specility',
        consult_fee='$consult_fee',
        available_days='$available_days',
        doc_bio='$doc_bio',
        photo_path='$doc_image'
        WHERE id='$id'";

    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        $success = "Doctor Updated Successfully!";
        
        // refresh updated data
        $result = mysqli_query($con, $sql);
        $doctor = mysqli_fetch_assoc($result);

    } else {
        $error = "Update Failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Doctor</title>
<link rel="stylesheet" href="css/editDoctors.css">
</head>
<body>
    <?php include 'shared/navbar.php'; ?>

<div class="container">

    <h2>Edit Doctor</h2>

    <?php if($success) echo "<div class='success'>$success</div>"; ?>
    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">

        <div class="input-group">
            <label>Doctor ID</label>
            <input type="text" name="doc_id" value="<?php echo $doctor['doc_id']; ?>" required>
        </div>

        <div class="input-group">
            <label>Doctor Name</label>
            <input type="text" name="doc_name" value="<?php echo $doctor['doc_name']; ?>" required>
        </div>

        <div class="input-group">
            <label>Speciality</label>
            <input type="text" name="doc_specility" value="<?php echo $doctor['doc_specility']; ?>" required>
        </div>

        <div class="input-group">
            <label>Consult Fee</label>
            <input type="text" name="consult_fee" value="<?php echo $doctor['consult_fee']; ?>" required>
        </div>

        <div class="input-group">
            <label>Available Days</label>
            <input type="text" name="available_days" value="<?php echo $doctor['available_days']; ?>" required>
        </div>

        <div class="input-group">
            <label>Doctor Image URL</label>
            <input type="text" name="doc_image" value="<?php echo $doctor['photo_path']; ?>" required>
        </div>

        <div class="input-group">
            <label>Doctor Bio</label>
            <textarea name="doc_bio" required><?php echo $doctor['doc_bio']; ?></textarea>
        </div>

        <button type="submit">Update Doctor</button>

    </form>

</div>
    <?php include 'shared/footer.php'; ?>

</body>
</html>
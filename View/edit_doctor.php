<?php
include "../Controller/db/db.php";

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

<style>
body{
    font-family: Arial;
    background:#f4f4ff;
    margin:0;
    padding:40px;
}

.container{
    max-width:800px;
    margin:auto;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#6d28d9;
    margin-bottom:20px;
}

.input-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
}

input, textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
}

textarea{
    height:120px;
    resize:none;
}

button{
    background:#7c3aed;
    color:white;
    padding:12px 20px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    width:100%;
    font-size:16px;
}

button:hover{
    background:#5b21b6;
}

.success{
    background:#dcfce7;
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
}

.error{
    background:#fee2e2;
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
}
</style>

</head>
<body>

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

</body>
</html>
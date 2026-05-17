<?php
include '../Controller/db/db.php';
session_start();

$email = $_SESSION['email'];

// GET existing data
$sql = "SELECT name, email, phone FROM users WHERE email='$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

// UPDATE logic
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $update = "UPDATE users 
               SET name='$name', phone='$phone' 
               WHERE email='$email'";

    if(mysqli_query($con, $update)){
        header("Location: profile.php");
        exit;
    } else {
        echo "Update failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Profile</title>

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
.profile-page{
    width:100%;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

/* ================= CARD ================= */
.profile-card{
    width:100%;
    max-width:550px;
    background:#fff;
    border-radius:25px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.3s;
}

.profile-card:hover{
    transform:translateY(-5px);
}

/* ================= HEADER ================= */
.profile-header{
    text-align:center;
    margin-bottom:25px;
}

.profile-avatar{
    width:90px;
    height:90px;
    background:#ede9fe;
    color:#6d28d9;
    font-size:40px;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:50%;
    margin:0 auto 15px auto;
    font-weight:bold;
}

.profile-header h2{
    font-size:28px;
    color:#222;
}

.profile-header p{
    color:#7c3aed;
    font-weight:bold;
}

/* ================= FORM AREA ================= */
.form-box{
    background:#f8f5ff;
    padding:20px;
    border-radius:15px;
}

/* INPUT ROW */
.input-group{
    margin-bottom:15px;
}

.input-group label{
    display:block;
    font-weight:bold;
    margin-bottom:6px;
    color:#444;
}

.input-group input{
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
    transition:0.2s;
}

.input-group input:focus{
    border-color:#7c3aed;
}

/* ================= BUTTON ================= */
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:#7c3aed;
    color:#fff;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
    margin-top:10px;
}

.btn:hover{
    background:#5b21b6;
}

/* SECOND BUTTON */
.back-btn{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    padding:10px;
    border-radius:12px;
    background:#e5e7eb;
    color:#333;
    font-weight:bold;
}

.back-btn:hover{
    background:#d1d5db;
}

</style>

</head>
<body>

<div class="profile-page">

    <div class="profile-card">

        <!-- HEADER -->
        <div class="profile-header">

            <div class="profile-avatar">✏️</div>

            <h2>Edit Profile</h2>
            <p>Update your account information</p>

        </div>

        <!-- FORM -->  
        <form method="POST" class="form-box">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="input-group">
                <label>Email </label>
                <input type="text" value="<?php echo $row['email']; ?>" disabled>
            </div>

            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
            </div>

            <button type="submit" name="update" class="btn">
                Update Profile
            </button>

            <a href="profile.php" class="back-btn">
                ← Back to Profile
            </a>

        </form>

    </div>

</div>

</body>
</html>
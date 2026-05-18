<?php
include '../Model/db.php';
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
 <link rel="stylesheet" href="css/editUserProfile.css">

</head>
<body>
    <?php include 'shared/navbar.php'; ?>


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
<?php include 'shared/footer.php'; ?>

</body>
</html>
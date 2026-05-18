
<?php
include '../Model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // HASH PASSWORD
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = $_POST['role'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];

    $sql = "INSERT INTO users 
    (name, email, phone, password, role, dob, blood_group) 
    VALUES 
    ('$name', '$email', '$phone', '$password', '$role', '$dob', '$blood_group')";

    if (mysqli_query($con, $sql)) {

        header("Location: login.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($con);

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Appointix Registration Form</title>

 <link rel="stylesheet" href="css/registration.css">

</head>
<body>
<?php include 'shared/navbar.php'; ?>

 <div class="main-content">
     <div class="container">

    <div class="title">
      <h1>Appointix</h1>
      <p>Create your account for Appointment Booking System</p>
    </div>

    <form action=""  method="POST">

      <!-- ID -->
      <!-- <div class="input-box">
        <label>User ID</label>
        <input type="number" name="id" placeholder="Enter ID">
      </div> -->

      <!-- Name -->
      <div class="input-box">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your name">
      </div>

      <!-- Email -->
      <div class="input-box">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email">
      </div>
        <!-- Phone -->
      <div class="input-box">
        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Enter phone number">
      </div>

      <!-- Password -->
      <div class="input-box">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
      </div>

      <!-- Role -->
      <div class="input-box">
        <label>Role</label>
        <select name="role">
          <option value="">Select Role</option>
          <option value="patient">Patient</option>
          <option value="doctor">Doctor</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- DOB -->
      <div class="input-box">
        <label>Date of Birth</label>
        <input type="date" name="dob">
      </div>

      <!-- Blood Group -->
      <div class="input-box">
        <label>Blood Group</label>
        <select name="blood_group">
          <option value="">Select Blood Group</option>
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
        </select>
      </div>

    
      <!-- Active -->
      <!-- <div class="full-width checkbox">
        <input type="checkbox" name="is_active" value="1">
        <label>Account is Active</label>
      </div> -->

      <!-- Created At -->
      <!-- <div class="input-box full-width">
        <label>Created At</label>
        <input type="datetime-local" name="created_at">
      </div> -->

      <!-- Button -->
      <button type="submit" class="btn">
        Register Now
      </button>

    </form>

  </div>
 </div>

  <?php include 'shared/footer.php'; ?>

</body>
</html>
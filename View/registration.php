
<?php
include '../Controller/db/db.php';

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

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body{
    
      min-height:100vh;
      /* display:flex;
      justify-content:center;
      align-items:center; */
      padding:0px 0px;
    }
       .main-content{
        display:flex;
        justify-content:center;
        align-items:center;
        padding:30px 0px;
         background-color: #f5f3ff;
    }


    .container{
      width:100%;
      max-width:700px;
      background:#fff;
      padding:35px;
      border-radius:20px;
      box-shadow:0 10px 30px rgba(0,0,0,0.2);
      margin-top:80px;
    }

    .title{
      text-align:center;
      margin-bottom:30px;
    }

    .title h1{
      color:#6d28d9;
      font-size:36px;
      margin-bottom:10px;
    }

    .title p{
      color:#666;
      font-size:15px;
    }

    form{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:20px;
    }

    .full-width{
      grid-column:1 / 3;
    }

    .input-box{
      display:flex;
      flex-direction:column;
    }

    .input-box label{
      margin-bottom:8px;
      font-weight:bold;
      color:#4c1d95;
    }

    .input-box input,
    .input-box select{
      padding:12px;
      border:2px solid #d8b4fe;
      border-radius:10px;
      outline:none;
      font-size:15px;
      transition:0.3s;
    }

    .input-box input:focus,
    .input-box select:focus{
      border-color:#7c3aed;
      box-shadow:0 0 8px rgba(124,58,237,0.3);
    }

    .checkbox{
      display:flex;
      align-items:center;
      gap:10px;
      margin-top:10px;
      color:#4c1d95;
      font-weight:bold;
    }

    .btn{
      grid-column:1 / 3;
      padding:14px;
      border:none;
      border-radius:12px;
      background:#7c3aed;
      color:white;
      font-size:18px;
      font-weight:bold;
      cursor:pointer;
      transition:0.3s;
    }

    .btn:hover{
      background:#5b21b6;
      transform:scale(1.02);
    }
 
    @media(max-width:700px){
      form{
        grid-template-columns:1fr;
      }

      .full-width,
      .btn{
        grid-column:1 / 2;
      }
    }

  </style>


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
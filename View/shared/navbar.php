
<?php  
session_start();

$showMessage=false;

$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
if ($loggedin) {
   $showMessage = "You are  logged in. Please log in to access this page.";
}

$adminLoggedIn = isset($_SESSION['role']) && $_SESSION['role'] === 'Admin';
if($adminLoggedIn){
    $showMessage = "You are logged in as admin. Please log in to access this page.";
}
$doctorLoggedIn = isset($_SESSION['role']) && $_SESSION['role'] === 'Doctor';
if($doctorLoggedIn){
    $showMessage = "You are logged in as doctor. Please log in to access this page.";
}



 ?>


<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Appointment Booking System</title>

  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      /* font-family: Arial, sans-serif; */
      font-family: 'Segoe UI', sans-serif;
    }

    body{
      background: #f4f4f4;
    }

        /* Navbar */
      .navbar{
      width: 100%;
      background: linear-gradient(90deg, #6a11cb, #8e2de2);
      padding: 12px 35px;
      display: flex;
      align-items: center;
      justify-content: space-between;

      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
    }

    /* Left Side Logo */
    .logo{
      color: white;
      font-size: 24px;
      font-weight: bold;
    }

    .logo span{
      color: #d8b4fe;
    }

    /* Middle Links */
    .nav-links{
      display: flex;
      gap: 30px;
      list-style: none;
    }

    .nav-links a{
      text-decoration: none;
      color: white;
      font-size: 17px;
      transition: 0.3s;
    }

    .nav-links a:hover{
      /* color: #d8b4fe; */
    }

    /* Right Buttons */
    .nav-buttons{
      display: flex;
      gap: 15px;
    }

    .btn{
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
      transition: 0.3s;
    }

    .login-btn{
      background: #6a11cb;
      color: white;
      border-radius: 30px;
      border: 1px solid white;
    }

    .login-btn:hover{
      background: #e9d5ff;
    }

    .register-btn{
     background: #6a11cb;
      color: white;
       border-radius: 30px;
       /* border: 1px solid white; */
    }

    .register-btn:hover{
      background: #a855f7;
    }

    /* Responsive */
    @media(max-width: 768px){
      .navbar{
        flex-direction: column;
        gap: 15px;
      }

      .nav-links{
        flex-wrap: wrap;
        justify-content: center;
      }
    }

  </style>


</head>
<body>

  <nav class="navbar">

    <!-- Left -->
    <div class="logo">
      Appoint<span style="color: #d8b4fe; font-weight: bold; font-size: 24px;">ix</span>
    </div>

    <!-- Middle -->
    <ul class="nav-links">
      <li><a href="home.php">Home</a></li>
      <li><a href="doctors.php">Doctors</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="contact.php">Contact</a></li>  
     
      
      <?php
       if (($loggedin==true && !$doctorLoggedIn) && !$adminLoggedIn) {
           echo '<li><a href="profile.php">Profile</a></li>';
       }
      ?>
      
      <?php
      if ($doctorLoggedIn) {
          echo '<li><a href="profile.php">Profile</a></li>';
      }
    ?>

    
   <?php
      // Show admin link only if user is admin
      if ($adminLoggedIn) {
          echo '<li><a href="admin.php">Admin Panel</a></li>';
      }
      ?>


  
        
    </ul>



      <div class="nav-buttons">
        <!-- <a href="login.php"><button class="btn login-btn">Login</button></a>
        <a href="registration.php"><button class="btn register-btn">Register</button></a> -->
        <div class="nav-buttons">

<?php
if ($loggedin) {
    echo '
    <a href="logout.php">
        <button class="btn register-btn">Logout</button>
    </a>
    ';
} else {
    echo '
    <a href="login.php">
        <button class="btn login-btn">Login</button>
    </a>

    <a href="registration.php">
        <button class="btn register-btn">Register</button>
    </a>
    ';
}
?>

</div>
      </div>

  </nav>

</body>
</html>   

  
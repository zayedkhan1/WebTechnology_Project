
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
  
  <link rel="stylesheet" href="css/navbar.css">
 
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

  
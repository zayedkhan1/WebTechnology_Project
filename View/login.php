


<?php
session_start();
include '../Model/db.php';

$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // GET USER BY EMAIL
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        // VERIFY HASHED PASSWORD
        if(password_verify($password, $row['password'])){

            // STORE SESSION
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            // GET ROLE
            $role = $row['role'];

            // ROLE BASED LOGIN
            if($role == "Admin"){

                header("Location: admin.php");
                exit;

            }else if($role == "Doctor"){

                header("Location: contact.php");
                exit;

            }else{

                header("Location: home.php");
                exit;

            }

        }else{

            $showError = "Invalid password";

        }

    }else{

        $showError = "Email not found";

    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Appointix</title>
    <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/login.css">
</head>

<body>

<?php include 'shared/navbar.php'; ?>








<!-- Login Section -->
<div class="login-page">


<?php if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

    <div class="login-box">
        <h2>Login to Appointix</h2>
        <p>Please enter your details</p>

        <form   method="POST">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <div class="extra-links">
                <a href="#">Forgot Password?</a> |
                <a href="register.php">Create Account</a>
            </div>
        </form>
    </div>
</div>

<?php include 'shared/footer.php' ?>

</body>
</html>
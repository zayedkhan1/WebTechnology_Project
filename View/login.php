
<?php
session_start();
include '../Controller/db/db.php';
$showError=false;
$admin_email = "admin@.com";
$admin_password = "admin123";

if($_SERVER["REQUEST_METHOD"]=="POST"){

   
   $email=$_POST['email'];
   $password= $_POST['password'];



     if ($email == $admin_email && $password == $admin_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'Admin';
        $_SESSION['role'] = 'admin';
        header("Location: admin.php"); // or admin_panel.php
        exit;
    }else{


$sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
  $result=mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);

  if($num==1){
            $showError="You are logged in";
    
    // session_start();
     $_SESSION['loggedin']=true;
    $_SESSION['email']=$email;
    $_SESSION['role'] = 'user'; // Set user role in session
    $_SESSION['id']=mysqli_fetch_assoc($result)['id']; // Store user ID in session


    header("Location:home.php");
}else{
        $showError="Invelid credentials";

  }

    }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Appointix</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f0ff;
        }

        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(106, 13, 173, 0.2);
        }

        .login-box h2 {
            text-align: center;
            color: #6a0dad;
            margin-bottom: 10px;
        }

        .login-box p {
            text-align: center;
            margin-bottom: 20px;
            color: #666;
            
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #6a0dad;
            font-size: 16px;
            font-weight: bold;
       }
        

        .input-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #6a0dad ;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #6a0dad;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.4);
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #6a0dad;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #520b9a;
        }

        .extra-links {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        .extra-links a {
            color: #6a0dad;
            text-decoration: none;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
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

        <form action  method="POST">
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
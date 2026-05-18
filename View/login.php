<?php
session_start();
include '../Controller/db/db.php';

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

        <form  method="POST">
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
<!-- Registration    -->
 
<?php
include '../Controller/db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $_POST['password']; // For simplicity, storing plain text (not recommended)
    $role = $_POST['role'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];

    // Insert user into database
    $sql = "INSERT INTO users (name, email, phone, password, role, dob, blood_group) VALUES ('$name', '$email', '$phone', '$password', '$role', '$dob', '$blood_group')";
    
    if (mysqli_query($con, $sql)) {
        echo "Registration successful!";
        // Redirect to login page or dashboard
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}



?>


<!-- Login -->
<?php
session_start();
include '../Controller/db/db.php';

$showError = false;


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // ADMIN LOGIN
    if ($role=="Admin") {

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'Admin';
        $_SESSION['role'] = 'admin';

        header("Location: admin.php");
        exit;

    }
    
    else{

        // USER LOGIN
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){

                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = $row['id'];

                header("Location: home.php");
                exit();

            }else{

                $showError = "Invalid credentials";

            }

        }else{

            $showError = "Invalid credentials";

        }
    }
}
?>


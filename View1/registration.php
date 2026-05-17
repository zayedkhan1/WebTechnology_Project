<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <div class="navbar">
        <h1>Appointix Workspace</h1>
        <div class="nav-links">
            <a href="login.php">Login</a>
        </div>
    </div>

    <div class="registration-container">
        <h2>Create Patient Account</h2>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert-error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <form action="../Controlller/registrationValidation.php" method="POST">
            
            <div class="input-group">
                <label>Full Name:</label>
                <input type="text" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="input-group">
                <label>Email Address:</label>
                <input type="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="Min 6 characters" required>
            </div>

            <div class="input-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" required>
            </div>

            <div class="input-group">
                <label>Blood Group:</label>
                <select name="blood_group" required>
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="input-group">
                <label>Phone Number:</label>
                <input type="text" name="phone" placeholder="01XXXXXXXXX" required>
            </div>

            <button type="submit" class="submit-btn">Register Now</button>
        </form>
    </div>

</body>
</html>
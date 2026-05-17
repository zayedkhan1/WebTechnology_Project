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
    <title>User Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <div class="navbar">
        <h1>Appointix Workspace</h1>
        <div class="nav-links">
            <a href="registration.php">Register</a>
        </div>
    </div>

    <div class="registration-container">
        <h2>Account Login</h2>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert-error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div style="background: #f0fdf4; color: #16a34a; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0; text-align: center; font-weight: bold;">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <form action="../Controlller/loginValidation.php" method="POST">
            
            <div class="input-group">
                <label>Email Address:</label>
                <input type="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>

</body>
</html>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/db.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$query = "SELECT id, name, email, role, is_active FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account Control</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script>
        function toggleActive(userId, buttonElement) {
            const formData = new FormData();
            formData.append('id', userId);

            fetch('../Controller/toggleUseractive.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    buttonElement.innerText = data.label;
                    if (data.new_status === 1) {
                        buttonElement.className = "status-btn btn-active";
                    } else {
                        buttonElement.className = "status-btn btn-inactive";
                    }
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('AJAX request failed');
            });
        }
    </script>
</head>
<body class="profile-body">

    <div class="navbar">
        <h1>Admin Control Panel</h1>
        <div class="nav-links">
            <a href="../Controller/logout.php">Logout</a>
        </div>
    </div>

    <div class="admin-table-container">
        <h2>User Account Management</h2>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo ucfirst(htmlspecialchars($user['role'])); ?></td>
                        <td>
                            <button 
                                onclick="toggleActive(<?php echo $user['id']; ?>, this)" 
                                class="status-btn <?php echo ((int)$user['is_active'] === 1) ? 'btn-active' : 'btn-inactive'; ?>"
                            >
                                <?php echo ((int)$user['is_active'] === 1) ? 'Active' : 'Inactive'; ?>
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
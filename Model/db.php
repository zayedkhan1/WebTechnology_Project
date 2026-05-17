 <?php
   require_once __DIR__ . '/../Model/db.php';
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "hospital_management_db"; 
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
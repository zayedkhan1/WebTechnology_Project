<?php
include "../Model/db.php";

$success = "";
$error = "";

// ================= ADD DOCTOR =================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc_id          = $_POST['doc_id'];
    $doc_name        = $_POST['doc_name'];
    $doc_specility   = $_POST['doc_specility'];
    $consult_fee     = $_POST['consult_fee'];
    $available_days  = $_POST['available_days'];
    $doc_bio         = $_POST['doc_bio'];
    $doc_image       = $_POST['doc_image'];

    $sql = "INSERT INTO doctors 
    (doc_id, doc_name, doc_specility, consult_fee, available_days, doc_bio, photo_path)
    
    VALUES 
    
    ('$doc_id', '$doc_name', '$doc_specility', '$consult_fee', '$available_days', '$doc_bio', '$doc_image')";

    $result = mysqli_query($con, $sql);

    if($result){
        $success = "Doctor Added Successfully!";
    }else{
        $error = "Something went wrong!";
    }
}

// ================= FETCH DOCTORS =================
$fetchSql = "SELECT * FROM doctors ORDER BY id DESC";
$fetchResult = mysqli_query($con, $fetchSql);

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>


<link rel="stylesheet" href="css/manageDoc.css">
</head>
<body>

<?php include 'shared/navbar.php'; ?>

<div class="admin-container">

    <!-- ================= TITLE ================= -->

    <div class="page-title">
        <h1>Manage Doctors</h1>
        <p>Add, manage and organize your doctors easily.</p>
    </div>

    <!-- ================= FORM ================= -->

    <div class="doctor-form">

        <h2>Add New Doctor</h2>

        <?php
            if($success){
                echo "<div class='success'>$success</div>";
            }

            if($error){
                echo "<div class='error'>$error</div>";
            }
        ?>

        <form method="POST">

            <div class="form-grid">

                <div class="input-group">
                    <label>Doctor Id</label>
                    <input type="text" name="doc_id" placeholder="Enter doctor ID" required>
                </div>
                <div class="input-group">
                    <label>Doctor Name</label>
                    <input type="text" name="doc_name" placeholder="Enter doctor name" required>
                </div>

                <div class="input-group">
                    <label>Doctor Speciality</label>
                    <input type="text" name="doc_specility" placeholder="e.g. Cardiologist" required>
                </div>

                <div class="input-group">
                    <label>Consult Fee</label>
                    <input type="text" name="consult_fee" placeholder="Enter fee amount" required>
                </div>

                <div class="input-group">
                    <label>Available Days</label>
                    <input type="text" name="available_days" placeholder="Sat - Thu (8:00 AM - 5:00 PM)" required>
                </div>
                <div class="input-group">
                    <label>Doc photo url</label>
                    <input type="text" name="doc_image" placeholder="Enter doctor image URL" required>
                </div>

                <div class="input-group full-width">
                    <label>Doctor Bio</label>
                    <textarea name="doc_bio" placeholder="Write doctor bio..." required></textarea>
                </div>
             

            </div>

            <button type="submit" class="submit-btn">
                Add Doctor
            </button>

        </form>

    </div>

    <!-- ================= TABLE ================= -->

    <div class="doctor-table">

        <h2>Doctor List</h2>

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Doctor Name</th>
                    <th>Speciality</th>
                    <th>Fee</th>
                    <th>Available Days</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php

            if($fetchResult && mysqli_num_rows($fetchResult) > 0){

                $serial = 1;

                while($doctor = mysqli_fetch_assoc($fetchResult)){

            ?>

                <tr>

                    <td><?php echo $serial++; ?></td>

                    <td>
                        <?php echo $doctor['doc_name']; ?>
                    </td>

                    <td>
                        <?php echo $doctor['doc_specility']; ?>
                    </td>

                    <td>
                        ৳ <?php echo $doctor['consult_fee']; ?>
                    </td>

                    <td>
                        <?php echo $doctor['available_days']; ?>
                    </td>

                    <td>

                    <a href='edit_doctor.php?id=<?php echo $doctor['id']; ?>' >
                        <button type="button" class="action-btn edit-btn">
                            Edit
                        </button>

                    </a>

                        <a href="delete_doctor.php?id=<?php echo $doctor['id']; ?>" 

                            onclick="return confirm('Are you sure you want to delete this doctor?');">

                            <button type="button" class="action-btn delete-btn">
                                Delete
                            </button>

                        </a>

                    </td>

                </tr>

            <?php

                }

            }else{

                echo "
                <tr>
                    <td colspan='6'>No Doctors Found.</td>
                </tr>
                ";

            }

            ?>

            </tbody>

        </table>

    </div>

</div>

<?php include 'shared/footer.php'; ?>

</body>
</html>
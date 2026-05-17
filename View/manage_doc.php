<?php
include "../Controller/db/db.php";

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

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f4ff;
        }

        .admin-container{
            width:100%;
            min-height:100vh;
            padding:40px 8%;
        }

        .page-title{
            text-align:center;
            margin-bottom:40px;
        }

        .page-title h1{
            font-size:42px;
            color:#6d28d9;
            margin-bottom:10px;
        }

        .page-title p{
            color:#666;
            font-size:17px;
        }

        /* ================= FORM ================= */

        .doctor-form{
            background:#fff;
            padding:35px;
            border-radius:20px;
            box-shadow:0 8px 25px rgba(0,0,0,0.08);
            margin-bottom:40px;
        }

        .doctor-form h2{
            color:#6d28d9;
            margin-bottom:25px;
            font-size:28px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:20px;
        }

        .input-group{
            display:flex;
            flex-direction:column;
        }

        .input-group label{
            margin-bottom:8px;
            color:#444;
            font-weight:bold;
        }

        .input-group input,
        .input-group textarea{
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            outline:none;
            font-size:15px;
            transition:0.3s;
        }

        .input-group textarea{
            resize:none;
            height:120px;
        }

        .input-group input:focus,
        .input-group textarea:focus{
            border-color:#7c3aed;
        }

        .full-width{
            grid-column:1/-1;
        }

        .submit-btn{
            margin-top:25px;
            background:#7c3aed;
            color:white;
            border:none;
            padding:14px 30px;
            border-radius:10px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
            font-weight:bold;
        }

        .submit-btn:hover{
            background:#5b21b6;
        }

        /* ================= ALERT ================= */

        .success{
            background:#dcfce7;
            color:#166534;
            padding:14px;
            border-radius:10px;
            margin-bottom:20px;
        }

        .error{
            background:#fee2e2;
            color:#991b1b;
            padding:14px;
            border-radius:10px;
            margin-bottom:20px;
        }

        /* ================= TABLE ================= */

        .doctor-table{
            background:#fff;
            padding:30px;
            border-radius:20px;
            box-shadow:0 8px 25px rgba(0,0,0,0.08);
            overflow-x:auto;
        }

        .doctor-table h2{
            color:#6d28d9;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table thead{
            background:#7c3aed;
            color:white;
        }

        table th,
        table td{
            padding:16px;
            text-align:left;
        }

        table tbody tr{
            border-bottom:1px solid #eee;
            transition:0.3s;
        }

        table tbody tr:hover{
            background:#f8f5ff;
        }

        .action-btn{
            padding:8px 16px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:bold;
            margin-right:8px;
            transition:0.3s;
        }

        .edit-btn{
            background:#ddd6fe;
            color:#5b21b6;
        }

        .edit-btn:hover{
            background:#c4b5fd;
        }

        .delete-btn{
            background:#fee2e2;
            color:#dc2626;
        }

        .delete-btn:hover{
            background:#fecaca;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            .page-title h1{
                font-size:32px;
            }

            .doctor-form,
            .doctor-table{
                padding:20px;
            }

            table th,
            table td{
                padding:12px;
                font-size:14px;
            }

        }

    </style>

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

                        <button class="action-btn edit-btn">
                            Edit
                        </button>

                        <button class="action-btn delete-btn">
                            Delete
                        </button>

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
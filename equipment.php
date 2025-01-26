<?php include './includes/dbconfig.php'; 
session_start(); 
$user_id = $_SESSION['id']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/log.css" />


</head>
<body style="background-image: url('./images/agriland.jpg');">
  
     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">Land</span>Lend</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="provider.php" class="nav-item nav-link ">Home</a>
                <a href="land.php" class="nav-item nav-link ">Add Plots</a>
                <a href="successpayment.php" class="nav-item nav-link ">Payment received</a>
                <a href="approve.php" class="nav-item nav-link ">Approved land</a>
                <a href="approvequipment.php" class="nav-item nav-link ">Approved equipment</a>
                <a href="equipment.php" class="nav-item nav-link active">Add equipment</a>
                <a href="providercontact.php" class="nav-item nav-link ">Contact</a>
                <a href="Login.php" class="nav-item nav-link ">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
<form method="POST" enctype="multipart/form-data">
<div class="card opacity-100 " style="width: 28rem; margin-left: 500px; margin-top: 80px; margin-bottom:10px; background-color:rgba(255, 255, 255, 0.5);">
            <div class="card-header" style="color:green">
                Add Equiment
            </div>
            <div class="card-body text-center ">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="eqname" placeholder=" Equipment name">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="model" placeholder="Model">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="Location" placeholder="Location">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="Amount" placeholder="Amount per day">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="vnumber" placeholder="Vehicle number(optional)">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" name="description" placeholder="Equiment Description"></textarea>
                </div>
                <div class="form-group mb-3">
                 <label style="color:green"><b>ADD IMAGE<b></label><input type="file" class="form-control-file" name="file"style="color:black" >
                </div>
                <button type="submit" name="add" style="width: 100px; background-color:orange; border-radius: 10px;"><b>Confirm</b></button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['add'])) {
        $eqname = $_POST['eqname'];
        $model = $_POST['model'];
        $Location=$_POST['Location'];
        $Amount=$_POST['Amount'];
        $vnumber=$_POST['vnumber'];
        $Description = $_POST['description'];
        $document = $_FILES['file']['name'];
        $document_temp=$_FILES['file']['tmp_name'];
        $document_folder = "uploadedfile/" . $document;
        $select="select * from users where id=$user_id";
        $results = mysqli_query($conn, $select);
        if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_array($results)) {
                            $Mobile=$row['Mobile'];
                        }
        }
        $query = "INSERT INTO product(eqname,model,Location,Amount,description,document,user_id,Mobile,vnumber) VALUES ('$eqname', '$model','$Location',
        '$Amount','$Description', '$document','$user_id','$Mobile','$vnumber')";
        
        $result = mysqli_query($conn, $query);
        if ($result) {
           move_uploaded_file($document_temp,$document_folder);
           echo'<script>alert("added")</script>';
        } else {
            echo'<script>alert("failed")</script>';

        }
    }
    ?>
</body>
</html>
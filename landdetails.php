<?php

include './includes/alert.php';
include './includes/dbconfig.php';

if (isset($_GET["mssg"])) {
    $value = array();
    array_push($value, $_GET["mssg"]);
    display_success($value);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Land Lend</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
 
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

 
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/design.css" rel="stylesheet">

    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        color: black !important;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
        body {
            color: black;
            /* background-image: url('./images/agriland.jpg'); */
            background-size: cover; /* This makes the background image cover the entire screen */
            background-position: center; /* This centers the background image */
            background-repeat: no-repeat; /* This ensures the background image is not repeated */
            height: 100vh; /* This sets the body height to 100% of the viewport height */
            margin: 0; /* This removes default body margin */
        }
</style>
</head>

<body >
<div class="container-fluid d-lg-block bg-white">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-start">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-2"></i>
                    <h4 class="mb-0">+012 345 6789</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand ms-lg-5">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Land</span>Lend</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-end">
                    <i class="bi bi-envelope fs-1 text-primary me-2"></i>
                    <h4 class="mb-0">landlend@gmail.com</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="Admin.php" class="nav-item nav-link ">Home</a>
                <a href="landverify.php" class="nav-item nav-link">Land verification</a>
                <a href="landdetails.php" class="nav-item nav-link active">Land details</a>
                <a href="eqverify.php" class="nav-item nav-link">Equipment verification</a>
                <a href="FarmerDetail.php" class="nav-item nav-link">View Users</a>
                <a href="Viewqueries.php" class="nav-item nav-link">View Queries</a>
                <a href="login.php" class="nav-item nav-link">Logout</a>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <?php
    $select = mysqli_query($conn, "select * from cartfarmer");
    $admin = mysqli_query($conn, "select * from admin");
    if (mysqli_num_rows($admin) > 0) {
        while ($row = mysqli_fetch_array($admin)) {
            $Mobile = $row['Mobile'];
        }
    }
    ?>

    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Plot ID</th>
                                            <th>farmer_id</th>
                                            <th >Area</th>
                                            <th>Location</th>
                                            <th>Soil type</th>
                                            <th> Amount</th>
                                            <th>Description</th>
                                            <th> Years</th>
                                            <th>Provider ID</th>
                                            <th>Mobile</th>
                                            <th> Payment</th>
                                            <th> Account number</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                    <?php
                    if (mysqli_num_rows($select) > 0) {
                        while ($row = mysqli_fetch_assoc($select)) {
                            ?>
                            <tr>

                                <td><?php echo $row['cartid']; ?></td>
                                <td><?php echo $row['farmer_id']; ?> </td>
                                <td><?php echo $row['area']; ?></td>
                                <td><?php echo $row['Location']; ?></td>
                                <td><?php echo $row['Soiltype']; ?></td>
                                <td><?php echo $row['Amount']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['years']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['Mobile']; ?></td>
                                <td><?php if($row['payment']==0) echo "Not paid";
                                else echo "Paid"; ?></td>
                                <td><?php echo $row['accno']; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>No Queries</td></tr>";
                    }
                    ?>
                </tbody>
                                </table>

</body>

</html>
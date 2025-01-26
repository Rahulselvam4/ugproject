<?php
include './includes/alert.php';
include './includes/dbconfig.php';
session_start();
$user_id = $_SESSION['id'];


?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
  <style>
        body {
            background-image: url('./images/agriland.jpg');
            background-size: cover; /* This makes the background image cover the entire screen */
            background-position: center; /* This centers the background image */
            background-repeat: no-repeat; /* This ensures the background image is not repeated */
            height: 100vh; /* This sets the body height to 100% of the viewport height */
            margin: 0; /* This removes default body margin */
        }
    </style> 
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <!-- Customized Bootstrap Stylesheet -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
     

     <link href="css/design.css" rel="stylesheet">

 </head>

 <body style="background-image: url('./images/agriland.jpg');">
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
                <a href="approve.php" class="nav-item nav-link active">Approved land</a>
                <a href="rentedeq.php" class="nav-item nav-link ">Rented equipment</a>
                <a href="approvequipment.php" class="nav-item nav-link ">Approved equipment</a>
                <a href="equipment.php" class="nav-item nav-link ">Add equipment</a>
                <a href="providercontact.php" class="nav-item nav-link ">Contact</a>
                <a href="Login.php" class="nav-item nav-link ">Logout</a>
            </div>
        </div>
    </nav>
   <div class="products">
        <div class="box-container">
            <!-- <form > -->
                <?php
                   $select = mysqli_query($conn, "select * from cart where user_id='$user_id'");
                   if (mysqli_num_rows($select) > 0) {
                       while ($row = mysqli_fetch_array($select)) {
                           $seller_id = $row['user_id'];
                   ?>
                        <div class="card opacity-100 " style="width: 28rem; margin-top: 10px; margin-bottom: 200px; display:inline-block;    background-color:rgba(255, 255, 255, 0.5);">
                            <div class="card-body text-center" style="display:inline-block">

                                <table class="table  table-hover table-borderless" style="color:black;">
                                    <tr>
                                        <th>
                                            <h3><i>Land Details</i></h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Area :
                                        </td>
                                        <td><?php echo $row['area'] ?>
                            </div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Mobile Number:
                                </td>
                                <td><?php echo $row['Mobile'] ?>
                        </div>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <div>Location:
                            </td>
                            <td><?php echo $row['Location'] ?>
        </div>
        </td>
        </tr>
        <tr>
            <td>
                <div>Soil Type:
            </td>
            <td><?php echo $row['Soiltype'] ?>
    </div>
    </td>
    </tr>
    <tr>
        <td>
            <div>Amount Per Sq.Ft:
        </td>
        <td><?php echo $row['Amount'] ?>
            </div>
        </td>
    </tr>
    <tr>
    <td>
 <div>Years:
</td>
<td><?php echo $row['years'] ?>
                            </div>
                            </td>
                            </tr>
                            <tr>
        <td>
            <div>Account No :
        </td>
        <td><?php echo $row['accno'] ?></div>
        </td>
    </tr>
    <tr>
        <td>
            <div>Description:
        </td>
        <td><?php echo $row['description'] ?></div>
        </td>
    </tr>


    </table>
     </div>
     </div>
     </form>
 <?php }
                    } ?>
 </div>

 </body>

 </html>
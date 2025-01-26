<?php
    include './includes/dbconfig.php';
    session_start();
    $farmer_id = $_SESSION['id'];
    if (isset($_POST['addcart'])) {
        $plot_id=$_POST['addcart'];
        $select_cart = mysqli_query($conn, "select * from products where plot_id = '$plot_id'") or die('query failed');
        $row = mysqli_fetch_assoc($select_cart);
        $plot_area = $row['area'];
        $plot_Number = $row['plotnumber'];
        $Location = $row['Location'];
        $soil = $row['Soiltype'];
        $Amount = $row['Amount'];
        $years = $row['years'];
        $Description = $row['description'];
        $userId = $row['user_id'];
        $mobile = $row['Mobile'];
        $document = $row['document'];
        $accno = $row['accno'];
        mysqli_query($conn, "insert into cart(farmer_id,area,plotnumber,Location,Soiltype,Amount,years,description,document,plot_id,accno,user_id)values('$farmer_id','$plot_area ','$plot_Number','$Location','$soil','$Amount','$years','$Description','$document','$plot_id','$accno','$userId')")or die("query wrong");
        mysqli_query($conn, "DELETE FROM products WHERE plot_id = ('$plot_id')")or die("query wrong");
        echo "<script>alert('Product added to cart'); window.location.href = 'landverify.php';</script>";
    };
    ?>
    
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">

     <link href="css/design.css" rel="stylesheet">
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

 </head>

 <body style="background-image: url('./images/agriland.jpg');">
 <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="Admin.php" class="nav-item nav-link ">Home</a>
                <a href="adminprofile.php" class="nav-item nav-link">Profile</a>
                <a href="landverify.php" class="nav-item nav-link active">Land verification</a>
                <a href="eqverify.php" class="nav-item nav-link">Equipment verification</a>
                <a href="landdetails.php" class="nav-item nav-link">Land details</a>
                <a href="FarmerDetail.php" class="nav-item nav-link">View Users</a>
                <a href="Viewqueries.php" class="nav-item nav-link">View Queris</a>
                <a href="login.php" class="nav-item nav-link">Logout</a>

            </div>
        </div>
    </nav>
     <div class="products">
         <div class="box-container">
             <form action="" method="post">
                 <?php
                    $select = mysqli_query($conn, "select * from products");
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
                                 <td><?php echo $row['plotnumber'] ?>
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
             <div>Amount:
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
             <div>Description:
         </td>
         <td><?php echo $row['description'] ?></div>
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
             <div>For Contact:
         </td>
         <td><?php echo $row['Mobile'] ?></div>
         </td>
     </tr>

     </table>
     <input type="hidden" name="area" value="<?php echo $row['area'];
                                                ?>">
     <input type="hidden" name="plotnumber" value="<?php echo $row['plotnumber'];
                                                    ?>">
     <input type="hidden" name="Location" value="<?php echo $row['Location'];
                                                    ?>">
     <input type="hidden" name="Soiltype" value="<?php echo $row['Soiltype'];
                                                ?>">
    <input type="hidden" name="years" value="<?php echo $row['years'];
                                                ?>">
     <input type="hidden" name="Amount" value="<?php echo $row['Amount'];
                                                ?>">
     <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
     <input type="hidden" name="file" value="<?php echo $row['document']; ?>">
     <input type="hidden" name="plot_id" value="<?php echo $row['plot_id'];?>">
     <input type="hidden" name="accno" value="<?php echo $row['accno'];?>">
     <a href="uploadedfile/<?php echo $row['document']; ?>" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>View Document<b></a>
     <a href="https://eservices.tn.gov.in/eservicesnew/land/chittaCheckNewRural_en.html?lan=en" type="submit"  target="_blank" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>Verify</b></a>
     <button  value="<?php echo $row['plot_id'];?>" name="addcart"  type="submit" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>APPROVE<b></button>
     </div>
     </div>
     </form>
    <?php }
    } ?>
                
 </div>

 </body>

 </html>
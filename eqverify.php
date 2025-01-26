
<?php
    include './includes/dbconfig.php';
    session_start();
    $farmer_id = $_SESSION['id'];
    if (isset($_POST['addcart1'])) {
        $eqid=$_POST['eqid'];
        $select_cart = mysqli_query($conn, "select * from product where eqid = '$eqid'") or die('query failed');
        $row = mysqli_fetch_assoc($select_cart);
        $eqname= $row['eqname'];
        $model= $row['model'];
        $Location = $row['Location'];
        $Amount = $row['Amount'];
        $user_id = $row['user_id'];
        $vnumber = $row['vnumber'];
        $Description = $row['description'];
        $mobile = $row['Mobile'];
        $document = $row['document'];
        mysqli_query($conn, "insert into cartequipment(Mobile,eqname,model,Location,Amount,description,document,eqid,vnumber,user_id)values('$mobile','$eqname','$model','$Location','$Amount','$Description','$document','$eqid','$vnumber','$user_id')")or die("query wrong");
        mysqli_query($conn, "DELETE FROM product WHERE eqid = ('$eqid')")or die("query wrong");
        echo "<script>alert('Equipment added to farmer '); window.location.href = 'eqverify.php';</script>";
    };
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="Admin.php" class="nav-item nav-link ">Home</a>
                <a href="landverify.php" class="nav-item nav-link">Land verification</a>
                <a href="landdetails.php" class="nav-item nav-link">Land details</a>
                <a href="eqverify.php" class="nav-item nav-link active">Equipment verification</a>
                <a href="FarmerDetail.php" class="nav-item nav-link">View Users</a>
                <a href="Viewqueries.php" class="nav-item nav-link">View Queries</a>
                <a href="login.php" class="nav-item nav-link">Logout</a>

            </div>
        </div>
    </nav>
     <div class="product">
         <div class="box-container">
             <form action="" method="post">
                 <?php
                    $select = mysqli_query($conn, "select * from product");
                    if (mysqli_num_rows($select) > 0) {
                        while ($row = mysqli_fetch_array($select)) {
                            $provider_id = $row['user_id'];
                    ?>
                         <div class="card opacity-100 " style="width: 28rem; margin-top: 10px; margin-bottom: 200px; display:inline-block;    background-color:rgba(255, 255, 255, 0.5);">
                             <div class="card-body text-center" style="display:inline-block">

                                 <table class="table  table-hover table-borderless" style="color:black;">
                                     <tr>
                                         <th>
                                             <h3><i>Equipment Details</i></h3>
                                         </th>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div>Equiment Name:
                                         </td>
                                         <td><?php echo $row['eqname'] ?>
                             </div>
                             </td>
                             </tr>
                                     <tr>
                                         <td>
                                             <div>Model:
                                         </td>
                                         <td><?php echo $row['model'] ?>
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
             <div>Amount Per Day:
         </td>
         <td><?php echo $row['Amount'] ?>
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
             <div>For Contact:
         </td>
         <td><?php echo $row['Mobile'] ?></div>
         </td>
     </tr>

     </table>
     <input type="hidden" name="eqname" value="<?php echo $row['eqname'];
                                                ?>">
     <input type="hidden" name="eqid" value="<?php echo $row['eqid'];
                                                ?>">
     <input type="hidden" name="model" value="<?php echo $row['model'];
                                                    ?>">
     <input type="hidden" name="Location" value="<?php echo $row['Location'];
                                                    ?>">
     <input type="hidden" name="Amount" value="<?php echo $row['Amount'];
                                                ?>">
    <input type="hidden" name="vnumber" value="<?php echo $row['vnumber'];
                                                ?>">
    <input type="hidden" name="user_id" value="<?php echo $row['user_id'];
                                                ?>">                                      
    
     <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
     <input type="hidden" name="file" value="<?php echo $row['document']; ?>">
     <a href="uploadedfile/<?php echo $row['document']; ?>" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>View Image<b></a>
     <a href="https://www.cars24.com/rto-vehicle-registration-details" 
      target="_blank" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>Verify</b></a>
     <button type="submit" name="addcart1" style="width: 120px; background-color:orange; border-radius: 10px;"><b>Approve</b></button>

     </div>
     </div>
     </form>
 <?php }
                    } ?>
 </div>

 </body>

 </html>
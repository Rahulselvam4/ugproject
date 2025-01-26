<?php

include './includes/alert.php';
include './includes/dbconfig.php';
session_start();
$consumer_id = $_SESSION['id'];
if (isset($_POST['submit'])) {
    // $consumer_id=$_POST['submit'];
   $id=$_POST['submit'];
   echo "$id";
    $select_cart = mysqli_query($conn, "select * from cultiproduct where id = '$id'") or die('query failed');
    $row = mysqli_fetch_assoc($select_cart);
    $product = $row['product'];
    $quantity = $row['quantity'];
    $Location = $row['Location'];
    $Amount = $row['Amount'];
    $description = $row['description'];
    $document = $row['document'];
    $user_id = $row['user_id'];
    mysqli_query($conn, "insert into cultiproduct2(product,Location,Amount,description,document,consumer_id,user_id,quantity,Mobile)values('$product','$Location','$Amount','$description','$document','$consumer_id','$user_id','$quantity','$Mobile')")or die("query wrong");
    mysqli_query($conn, "DELETE FROM cultiproduct WHERE id = ('$id')")or die("query wrong");
    echo "<script>window.location.href = 'cartcustomer.php';</script>";
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
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">Land</span>Lend</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="consumer.php" class="nav-item nav-link ">Home</a>
                <a href="consumerproducts.php" class="nav-item nav-link  active ">View product</a>
                <a href="cartcustomer.php" class="nav-item nav-link ">Cart</a>
                <a href="consumercontact.php" class="nav-item nav-link ">Contact</a>
                <a href="login.php" class="nav-item nav-link ">Logout</a>
              
            </div>
        </div>
    </nav>
     <div class="product">
         <div class="box-container">
             <form action="" method="post">
                 <?php
                    $select = mysqli_query($conn, "select * from cultiproduct");
                    if (mysqli_num_rows($select) > 0) {
                        while ($row = mysqli_fetch_array($select)) {
                            $consumer_id = $row['user_id'];
                            $d=$row['id'];
                         echo "$d";
                    ?>
                         <div class="card opacity-100 " style="width: 28rem; margin-top: 10px; margin-bottom: 200px; display:inline-block;    background-color:rgba(255, 255, 255, 0.5);">
                             <div class="card-body text-center" style="display:inline-block">

                                 <table class="table  table-hover table-borderless" style="color:black;">
                                     <tr>
                                         <th>
                                             <h3><i>Product Details</i></h3>
                                         </th>
                                     </tr>
                                     <tr>
                                         <td>
                                             <div>Product Name:
                                         </td>
                                         <td><?php echo $row['product'] ?>
                             </div>
                             </td>
                             </tr>
                                     <tr>
                                         <td>
                                             <div>Quantity:
                                         </td>
                                         <td><?php echo $row['quantity'] ?>
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
             <div>Amount:
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
     <input type="hidden" name="product" value="<?php echo $row['product'];
                                                ?>">
  <input type="hidden" name="id" value="<?php echo $row['id'];
                                                ?>">
     <input type="hidden" name="quantity" value="<?php echo $row['quantity'];
                                                    ?>">
     <input type="hidden" name="Location" value="<?php echo $row['Location'];
                                                    ?>">
     <input type="hidden" name="Amount" value="<?php echo $row['Amount'];
                                                ?>">
     <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
     <input type="hidden" name="file" value="<?php echo $row['document']; ?>">
     <a href="uploadedfile/<?php echo $row['document']; ?>" style="width: 100px; color:black; padding:3px; background-color:ORANGE; border-radius: 10px; border:2px solid black;"><b>View Image<b></a>
     <button type="submit" value="<?php echo $row['id'];?>" name="submit" style="width: 120px; background-color:orange; border-radius: 10px;"><b>BUY</b></button>

     </div>
     </div>
     </form>
 <?php }
                    } ?>
 </div>

 </body>

 </html>
<?php
include './includes/dbconfig.php';
if(isset($_POST['send'])){
 $mobile = $_POST['phone']; 
 $email = $_POST['email']; 
 $msg = $_POST['message']; 

 if($conn->connect_error){ 
 die("connection failed : ".$conn->connect_error); 
 } 
 else{ 
 mysqli_query($conn,"insert into 
contact_Admin(Mobile,Message,Email)values('$mobile','$msg','$email') ") or die('query failed'); 
 echo "<script>alert('Message sent Successfully');</script>"; 
 } 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/log.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            margin: auto; /* Center the table on the page */
        }

        .card-body {
            max-width: 400px; /* Set a maximum width for the card body */
            margin: auto; /* Center the card body within the table cell */
        }

        .input-group {
            text-align: left; /* Adjust text alignment as needed */
        }
        .input-group2 {
            text-align: centre; /* Adjust text alignment as needed */
        }
    </style>

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
                <a href="consumerproducts.php" class="nav-item nav-link ">View product</a>
                <a href="cartcustomer.php" class="nav-item nav-link ">Cart</a>
                <a href="consumercontact.php" class="nav-item nav-link active">Contact</a>
                <a href="login.php" class="nav-item nav-link ">Logout</a>
              
            </div>
        </div>
    </nav>
   
  <div class="card opacity-100 mx-auto" style="width: 28rem;  margin-top:10px;color:black; background-color:rgba(255, 255, 255, 0.5);">
  <table>
        <tr>
            <td>
                <form method="post">
                    <div class="card-body text-center">
                        <h4 class="text-black">Contact Us</h4>
                        <div class="input-group">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" placeholder="email">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="phone" placeholder="phone">
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="input-group2">
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="send"><i class="bi bi-chat"></i> Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </table> 
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
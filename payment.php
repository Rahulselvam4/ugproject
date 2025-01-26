<?php
include './includes/alert.php';
include './includes/dbconfig.php';
session_start();
$cartid=$_SESSION['cartid'];
$select_cart = mysqli_query($conn, "select * from cartfarmer where cartid = '$cartid'") or die('query failed');
$row = mysqli_fetch_assoc($select_cart);
$lastVehiclePrice = $row['accno'];
$lastNumberOfDays = $row['years'];
$TotalBill = $row['Amount'];
if (isset($_POST['submit'])) {
    
    mysqli_query($conn, "UPDATE cartfarmer SET payment = 1 WHERE cartid = '$cartid'");
    echo "<script>alert('PAYMENT SUCCESSFULL');window.location.href = 'cartfarmer.php';</script>";

};
?>

<!DOCTYPE html>
<html>
<head>
<title>pay</title>

<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/stylee.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body class="agileits_w3layouts">
 <div class="w3layouts_main wrap">
 <h1 class="agile_head text-center">PAYMENT</h1>
<div class="background">

</div>


      <form action="" method="post" class="agile_form">
      <h2>Number of Years: <?php echo $lastNumberOfDays; ?></h2> 
      <h2>Account number: <?php echo $lastVehiclePrice; ?></h2>
      <h2>Total amount: <?php echo $TotalBill; ?></h2>  
      <input type="text" placeholder="Your Name " name="name" minlength="3" />
      <input type="email" placeholder="Your Email " name="email"/>
      <input type="text" placeholder="Your Phone Number " name="num" maxlength="10"  /><br>
<!-- Card Number -->
    <div class="form-group">
      <label class="col-sm-4 control-label" for="textinput"></label>
      <div class="col-sm-6">
        <input type="text" id="cardnumber"  minlength="16" maxlength="16" placeholder="Card Number" class="card-number form-control">
      </div>
    </div>

<!-- CVV -->
    <div class="form-group">
      <label class="col-sm-4 control-label" for="textinput"></label>
      <div class="col-sm-3">
        <input type="text" id="cvv" placeholder="CVV" minlength="3" maxlength="3" class="card-cvc form-control">
      </div>
    </div>
<h2><left>
<center><input type="submit" name="submit" value="P A Y   N O W" class="agileinfo" /></center>
        </div>
      </div>
    </div>
      
<br>
<br>
<p>
  
  </div>
  <div class="agileits_copyright text-center">
      
  </div>
</body>
</html>
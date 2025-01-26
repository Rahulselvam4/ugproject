<!-- ALERTS INCLUDES -->
<?php

include './includes/alert.php';
include './includes/dbconfig.php';
session_start();
if (isset($_GET["mssg"])) {
  $value = array();
  array_push($value, $_GET["mssg"]);
  display_success($value);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/log.css" />
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/design.css" rel="stylesheet">
  <title>login</title>
</head>

<body style="background-image: url('./images/register.jpg');">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto py-0">
        <a href="index.php" class="nav-item nav-link ">Home</a>
        
        <a href="register.php" class="nav-item nav-link">Register</a>
        <a href="login.php" class="nav-item nav-link active">Login</a>
        
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <div class="card opacity-100 mx-auto" style="width: 28rem;  margin-top:10px;color:black; background-color:rgba(255, 255, 255, 0.5);">

    <form method="post" action="#">
      <div class="card-body text-center">
        <h3 class="card-title">LOGIN</h3><br>
        <table>
          <tr>
            <td><label><b>EMAIL:</b></label></td>
            <td><input type="text" name="email" /></td>
          </tr>

          <tr>
            <td><label><b>PASSWORD:</b></label></td>
            <td><input type="password" name="password" /></td>
          </tr>
        </table>
        <br>
        <button type="submit" style="width: 100px; background-color:orange; border-radius: 10px;" name="logclick"><b>LOGIN</b></button>
      </div>
    </form>

  </div>
  </div>
 

  <?php
  if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($email != "" and $password != "") {
      $query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password' ";
      $result = mysqli_query($conn, $query);

      if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        if ($row['Category'] == 2) {


          echo $row['id'];
          header('location:provider.php');
        } 
        else if ($row['Category'] == 0) {


          echo $row['id'];
          header('location:Admin.php');
        } 
        else if ($row['Category'] == 3) {


          echo $row['id'];
          header('location:consumer.php');
        } 
        else
          header('location:farmer.php');
      } else {
        echo "<script>alert('Invalid Email or Password');</script>";
      }

     
    } else {
      display_alert(["Please Fill All The Fields"]);
    }
    mysqli_close($conn);
  }

  ?>

</body>

</html>
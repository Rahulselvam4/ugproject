<?php include './includes/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/log.css" />
  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/design.css" rel="stylesheet">
  <title>register</title>
</head>

<body style="background-image: url('./images/register.jpg');">


    

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto py-0">
        <a href="index.php" class="nav-item nav-link">Home</a>
        <a href="register.php" class="nav-item nav-link active">Register</a>
        <a href="login.php" class="nav-item nav-link">Login</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- ALERTS INCLUDES -->
  <?php include './includes/alert.php'; ?>

  <form method="post" action="#">
    <div class="card opacity-100  mx-auto" style="width: 28rem; margin-top: 10px; color: black; background-color:rgba(255, 255, 255, 0.5);">

      <div class="card-body text-center">
        <h3 class="card-title">REGISTER</h3><br>
        <table>
          <tr>
            <td><b><label for="uname">USERNAME </label></b></td>
            <td><input type="text" name="uname" required></td>
          </tr>

          <tr>
            <td><b><label for="email">EMAIL </label></b></td>
            <td><input type="text" name="email" required></td>
          </tr>

          <tr>
            <td><b><label for="mobile">MOBILE </label></b></td>
            <td><input type="Number" name="mobile" minlength="10" maxlength="10" required></td>
          </tr>

          <tr>
            <td><b><label for="password">PASSWORD </label></b></td>
            <td><input type="password" name="password" required></td>
          </tr>

          <tr>
            <td><b><label for="password">CONFIRM PASSWORD </label></b></td>
            <td><input type="password" name="passwordconf" required></td>
          </tr>
        </table>

        <p class="card-text"><b>CATEGORY</b></p>
        <input type="radio" id="farm" name="category" value="1" required="true">
        <label for="farm"><b>FARMER</b></label><BR>
        <input type="radio" id="sell" name="category" value="2" required="true">
        <label for="sell"><b>LAND OR EQUIPMENT PROVIDER</b></label><br>
        <input type="radio" id="sell" name="category" value="2" required="true">
        <label for="sell"><b>CONSUMER</b></label><br><br>
        <button type="submit" style="width: 100px; background-color:orange; border-radius: 10px;"><b>REGISTER</b></button>
      </div>
    </div>
  </form>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <?php
  $errors = array();
  if ($_POST) {

    // USERNAME VALIDATION

    $username = $_POST['uname'];
    if (!empty($_POST['uname'])) {
      if (!preg_match("/^[a-zA-z ]*$/", $username)) {
        array_push($errors, "Only alphabets and whitespace are allowed.");
      }
    } else {
      array_push($errors, "Name Field Is Required.");
    }

    //EMAIL VALIDATION

    $email = $_POST['email'];
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!empty($_POST['email'])) {
      if (!preg_match($pattern, $email)) {
        array_push($errors, "Email Is Not Valid.");
      }
    } else {
      array_push($errors, "Email Field Is Required");
    }

    // MOBILE NUMBER VALIDATION

    $mobile = strval($_POST['mobile']);
    $length = strlen($mobile);

    if (!empty($_POST['mobile'])) {
      if (!preg_match("/^[0-9]*$/", $mobile)) {
        array_push($errors, "Only Numeric Value Is Allowed In Mobile Field.");
      }
      if ($length != 10) {
        array_push($errors, "Mobile must have 10 digits.");
      }
    } else {
      array_push($errors, "Mobile Number Is Required");
    }


    // PASSWORD VALIDATION
    $password1 = $_POST['password'];
    $password2 = $_POST['passwordconf'];

    if (strval($password1) != strval($password2)) {
      array_push($errors, "Passwords Are Not Same.");
    }
    if (strlen($password1) < '8' or strlen($password2) < '8') {
      array_push($errors, "Password Must Be At Least 8 Characters");
    }


    // CATEGORY VALIDATION
    $category = $_POST['category'];

    // EXECUTE ALERTS
    if (count($errors) !== 0) {
      display_alert($errors);
    }

    
    else {

      $password = $password1;
      $query = "INSERT INTO users(Name, Email, Password, Mobile, Category) VALUES ('$username', '$email', '$password', $mobile, $category)";

      $check_mail = "SELECT Name from users WHERE Email='$email'";

      $result = mysqli_query($conn, $check_mail);
      echo mysqli_num_rows($result);
      if (mysqli_num_rows($result)) {
        display_alert(["Email Id Is Already Registered"]);
      } else {
        if (mysqli_query($conn, $query)) {
          header("Location: ./login.php?mssg=User Registration Completed Successfully. Please Enter Your Credentials ");
        } else {
          display_danger(["User Registration Failed"]);
        }
      }


      mysqli_close($conn);
    }
  }
  ?>

</body>

</html>
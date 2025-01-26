<?php

include './includes/alert.php';
include './includes/dbconfig.php';
session_start();
$farmer_id = $_SESSION['id'];
if (isset($_POST['submit'])) {
    $cartid=$_POST['submit'];
    $_SESSION['cartid'] = $cartid;
    $select_cart = mysqli_query($conn, "select * from cart where cartid = '$cartid'") or die('query failed');
    $row = mysqli_fetch_assoc($select_cart);
    $plot_area = $row['area'];
    $plot_Number = $row['plotnumber'];
    $Location = $row['Location'];
    $soil = $row['Soiltype'];
    $Amount = $row['Amount'];
    $years = $row['years'];
    $Description = $row['description'];
    $accno = $row['accno'];
    $userId = $row['user_id'];
    $mobile = $row['Mobile'];
    $document = $row['document'];
    mysqli_query($conn, "insert into cartfarmer(farmer_id,area,Mobile,Location,Soiltype,Amount,years,description,document,cartid,user_id,accno)values('$farmer_id','$plot_area ','$plot_Number','$Location','$soil','$Amount','$years','$Description','$document','$cartid','$userId','$accno')")or die("query wrong");
    mysqli_query($conn, "DELETE FROM cart WHERE cartid = ('$cartid')")or die("query wrong");
    echo "<script>window.location.href = 'payment.php';</script>";

};

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/log.css" /> -->
    <!-- Template Stylesheet -->

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
       body {
    font-family: Arial, sans-serif;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
}

.close {
    color: #aaa;
    float: left;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}

button {
    display: block;
    margin-top: 10px;
}
p{
    text-align:left;
}
h2{
    text-align:center;
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
                <a href="farmer.php" class="nav-item nav-link ">Home</a>
                <a href="farmerland.php" class="nav-item nav-link active">Land</a>
                <a href="cartfarmer.php" class="nav-item nav-link ">Land Cart</a>
                <a href="farmerequipment.php" class="nav-item nav-link ">Equipment</a>
                <a href="farmequipment.php" class="nav-item nav-link ">Equipment Cart</a>
                <a href="cultiproduct.php" class="nav-item nav-link ">Sell products</a>
                <a href="farmercontact.php" class="nav-item nav-link ">Contact</a>
                <a href="login.php" class="nav-item nav-link ">Logout</a>
              
            </div>
        </div>
    </nav>
    <div class="products">
        <div class="box-container">
            <!-- <form > -->
                <?php
                   $select = mysqli_query($conn, "select * from cart");
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
            <div>Amount :
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
    <!-- <input type="hidden" name="Mobile" value="<?php echo $row['mobile'];
                                               ?>"> -->
    <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
    <input type="hidden" name="file" value="<?php echo $row['document']; ?>">
    <input type="hidden" name="plot_id" value="<?php echo $row['plot_id'];?>">
    <a href="uploadedfile/<?php echo $row['document']; ?>" style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>View Document<b></a>
    <button id="showDialogBtn" type="submit"  style="width: 100px; color:black; padding:3px; background-color:orange; border-radius: 10px; border:2px solid black;"><b>Lease</b></button>
    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeDialogBtn">&times;</span>
        <h2>Agreement</h2>
        <p>

Terms and Conditions:
<br>1)Land Description:<br>
The Provider agrees to lend the Farmer the property located at [address], herein referred to as the "Property," for the purpose of [specify purpose, e.g., residential development, agricultural use, etc.].
<br><br>
2)Loan Amount and Repayment:<br>
The Provider agrees to lend [amount] to the Farmer, and the Farmer agrees to repay the loan amount in accordance with the agreed-upon terms outlined in the attached repayment schedule.
<br><br>
3)Misbehavior Clause:<br>
In the event of any misbehavior, misconduct, or unlawful activities occurring on the Property by the Farmer, their representatives, or any third parties associated with the Farmer, the Provider reserves the right to take appropriate legal action. This may include involving law enforcement authorities to address and rectify the situation.
<br><br>
4)Default and Consequences:<br>
In the event of default on the loan terms or any breach of this Agreement, the Provider reserves the right to take legal action to recover the outstanding amount and may also initiate foreclosure proceedings on the Property.
<br><br>
5)Governing Law:<br>
This Agreement shall be governed by and construed in accordance with the laws of [state/country], and any disputes arising out of or in connection with this Agreement shall be resolved through arbitration in accordance with the rules of [arbitration organization].
<br><br>
</p>
    <form action = "" method = "POST">
        <input type="hidden" name="Amount" value="<?php echo $row['Amount'];?>">
        <button value="<?php echo $row['cartid'];?>" id="button1" name="submit" >Agree & Payment</button>
</form>
    </div>
</div>

<script>
   document.getElementById('showDialogBtn').addEventListener('click', function() {
    event.preventDefault();
    document.getElementById('myModal').style.display = 'block';
});

document.getElementById('closeDialogBtn').addEventListener('click', function() {
    document.getElementById('myModal').style.display = 'none';
});

document.getElementById('button1').addEventListener('click', function() {
    alert('You agreed to this term');
});
</script>

</div>
    </div>
   <?php }
   } ?>
               
</div>



</body>

 </html>
<?php
include './includes/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/design.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/log.css" />
    <style>
        /* Additional Styles */
        th {
            background-color: #6c757d; /* Change heading color */
            color: #fff;
            border: 2px solid #343a40; /* Fix border width */
        }

        td {
            border: 2px solid #343a40; /* Fix border width for table cells */
        }

        thead {
            background-color: #007bff; /* Change background color of thead */
            color: #fff;
        }
    </style>
</head>

<body style="background-image: url('./images/agriland.jpg');">
    <?php
    $select = mysqli_query($conn, "select * from contact_admin");
    $admin = mysqli_query($conn, "select * from admin");
    if (mysqli_num_rows($admin) > 0) {
        while ($row = mysqli_fetch_array($admin)) {
            $Mobile = $row['Mobile'];
        }
    }
    ?>
     <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5" id="home">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="Admin.php" class="nav-item nav-link ">Home</a>
                <a href="landverify.php" class="nav-item nav-link">Land verification</a>
                <a href="landdetails.php" class="nav-item nav-link">Land details</a>
                <a href="eqverify.php" class="nav-item nav-link">Equipment verification</a>
                <a href="FarmerDetail.php" class="nav-item nav-link">View Users</a>
                <a href="Viewqueries.php" class="nav-item nav-link active">View Queries</a>
                <a href="login.php" class="nav-item nav-link">Logout</a>

            </div>
        </div>
    </nav>
    <div class="query-container">
        <div class="display">
            <table class="table table-dark table-hover table-bordered border-primary mt-5" id="product">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($select) > 0) {
                        while ($row = mysqli_fetch_assoc($select)) {
                            ?>
                            <tr>
                                <td><?php echo $row['Email']; ?></td>
                                <td>
                                        <?php echo $row['Message']; ?>
                                    </div>
                                </td>
                                <td><?php echo $row['Mobile']; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>No Queries</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.message-toggle').click(function() {
                var messageId = $(this).data('message-id');
                $('#message-' + messageId).toggle();
            });
        });
    </script>
</body>

</html>

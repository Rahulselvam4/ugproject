<?php
$conn = mysqli_connect("localhost", "root", "") or die("Could not connect the server");
$db = mysqli_select_db($conn, "landlend") or die("Could not select the database");
?>
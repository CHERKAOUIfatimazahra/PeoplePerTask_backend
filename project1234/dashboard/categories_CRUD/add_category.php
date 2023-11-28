<?php
require './../data_connection/database.php';

$name = $_POST['name'];

$insertCatQuery = "INSERT INTO categories (CategoryName) 
VALUES ('$name')";

$res = mysqli_query($con, $insertCatQuery);

if ($res)
    header("location: ./../categorys.php");

mysqli_close($con);
?>
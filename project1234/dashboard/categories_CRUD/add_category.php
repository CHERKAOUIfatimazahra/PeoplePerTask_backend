<?php
require './../data_connection/database.php';

$name = htmlspecialchars(trim($_POST['name']));
$categ_img = htmlspecialchars(trim($_POST['img']));

$insertCatQuery = "INSERT INTO categories (CategoryName,category_img) 
VALUES ('$name','$categ_img')";

$res = mysqli_query($con, $insertCatQuery);

if ($res)
    header("location: ./../categorys.php");

mysqli_close($con);
?>
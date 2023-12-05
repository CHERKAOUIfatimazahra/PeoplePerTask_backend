<?php
require './../data_connection/database.php';

$name = htmlspecialchars(trim($_POST['name']));
$categ_img = htmlspecialchars(trim($_POST['img']));

$insertCatQuery = "INSERT INTO categories (CategoryName,category_img) 
VALUES ('$name','$categ_img')";

$res = mysqli_query($con, $insertCatQuery);

if ($res)
    // Admin role
    if ($user_data['role'] == 'Admin') {
        $_SESSION['UserID'] = $user_data['UserID'];
        header("location: ./../categorys.php");
        die;
    }
   

mysqli_close($con);
?>
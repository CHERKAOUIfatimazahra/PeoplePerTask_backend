<?php
require './../data_connection/database.php';

$title = htmlspecialchars(trim($_POST['Project_Title']));
$desc = htmlspecialchars(trim($_POST['Descrip_project']));
$cat_id = htmlspecialchars(trim($_POST['Category_ID']));
$sub_id = htmlspecialchars(trim($_POST['sub_Category_ID']));


$insertUserQuery = "INSERT INTO Projects (Project_Title, Descrip_project, Category_ID, sub_Category_ID) 
VALUES ('$title', '$desc' , '$cat_id' , '$sub_id')";

$res = mysqli_query($con, $insertUserQuery);

if ($res)
    header("location: ./../projects.php");

mysqli_close($con);
?>